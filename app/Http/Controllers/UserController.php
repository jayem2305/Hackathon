<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function deactivate($id)
    {
        // Log the deactivation attempt
        Log::info("Attempting to deactivate user with ID: $id");
        $user = User::where('id', $id)->first();

        // Log the current role of the user before changing it
        Log::info("Current role of user with ID $id: " . $user->role);

        $user->role = 'Deactivated';  // Update role
        $user->save();

        // Log the role after updating it
        Log::info("Updated role of user with ID $id to: " . $user->role);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'id' => $id]);
        }

        return redirect()->route('listofaccount')->with('success', 'User deactivated.');
    }
    public function admin($id)
    {
        // Log the deactivation attempt
        Log::info("Attempting to admin this user with ID: $id");
        $user = User::where('id', $id)->first();

        // Log the current role of the user before changing it
        Log::info("Current role of user with ID $id: " . $user->role);

        $user->role = 'admin';  // Update role
        $user->save();

        // Log the role after updating it
        Log::info("Updated role of user with ID $id to: " . $user->role);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'id' => $id]);
        }

        return redirect()->route('listofaccount')->with('success', 'User updated.');
    }
    public function faculty($id)
    {
        // Log the deactivation attempt
        Log::info("Attempting to faculty this user with ID: $id");
        $user = User::where('id', $id)->first();

        // Log the current role of the user before changing it
        Log::info("Current role of user with ID $id: " . $user->role);

        $user->role = 'faculty_member';  // Update role
        $user->save();

        // Log the role after updating it
        Log::info("Updated role of user with ID $id to: " . $user->role);

        if (request()->ajax()) {
            return response()->json(['success' => true, 'id' => $id]);
        }

        return redirect()->route('listofaccount')->with('success', 'User updated.');
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[A-Za-z]+$/',
            'middle_name' => 'nullable|regex:/^[A-Za-z]+$/',
            'last_name' => 'required|regex:/^[A-Za-z]+$/',
            'ext_name' => 'nullable|regex:/^[A-Za-z]+$/',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string',
        ]);

        // Encrypt specific fields
        $validated['first_name'] = Crypt::encryptString($validated['first_name']);
        if (!empty($validated['middle_name'])) {
            $validated['middle_name'] = Crypt::encryptString($validated['middle_name']);
        }
        $validated['last_name'] = Crypt::encryptString($validated['last_name']);
        if (!empty($validated['ext_name'])) {
            $validated['ext_name'] = Crypt::encryptString($validated['ext_name']);
        }
        $validated['email'] = Crypt::encryptString($validated['email']);

        $user->update($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('listofaccount')->with('success', 'User updated successfully.');
    }
    public function getDataForTable(Request $request)
    {
        $query = User::query();

        // Search
        if ($request->has('search') && $request->input('search.value') != '') {
            $search = $request->input('search.value');
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Pagination
        $users = $query->skip($request->input('start'))
            ->take($request->input('length'))
            ->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => User::count(),
            'recordsFiltered' => $query->count(),
            'data' => $users // ✅ JS should use response.data
        ]);
    }


}