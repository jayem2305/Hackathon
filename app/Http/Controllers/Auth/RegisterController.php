<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    // Show registration form// Show the user registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the form submission and store user data
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[\w.+-]+@(gmail\.com|yahoo\.com)$/i'
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one digit
                'regex:/[@$!%*#?&]/'  // at least one special character
            ],
            'first_name' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'last_name' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'middle_name' => ['nullable', 'regex:/^[A-Za-z ]+$/'],
            'ext_name' => ['nullable', 'regex:/^[A-Za-z ]+$/'],
            'dob' => 'nullable|date|before:today',
            'phone_number' => 'required',
            'address' => 'required',
            'role' => 'required|in:admin,faculty_member',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle profile image
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = $file->getClientOriginalName(); // create a unique filename
            $file->move(public_path('profiles'), $filename); // move to public/profiles
            $imagePath = 'profiles/' . $filename; // save the path to DB
        }

        // Create user
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'first_name' => Crypt::encryptString($validated['first_name']),
            'last_name' => Crypt::encryptString($validated['last_name']),
            'middle_name' => $request->middle_name ? Crypt::encryptString($request->middle_name) : null,
            'ext_name' => $request->ext_name ? Crypt::encryptString($request->ext_name) : null,
            'dob' => $request->dob,
            'phone_number' => Crypt::encryptString($validated['phone_number']),
            'address' => Crypt::encryptString($validated['address']),
            'role' => $validated['role'],
            'profile_image' => $imagePath,
        ]);


        return redirect()->route('register')->with('success', 'Registration successful!');
    }
}
