<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'role' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle profile image
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profiles', 'public');
        }

        // Create user
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'middle_name' => $request->middle_name,
            'ext_name' => $request->ext_name,
            'dob' => $request->dob,
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'role' => $validated['role'],
            'profile_image' => $imagePath,
        ]);

        return redirect()->route('register')->with('success', 'Registration successful!');
    }
}
