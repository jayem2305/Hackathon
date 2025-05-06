<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function listOfAccounts()
    {
        $users = User::all();

        // Decrypt necessary fields (if stored encrypted)
        foreach ($users as $user) {
            try {
                $user->first_name = Crypt::decryptString($user->first_name);
                $user->last_name = Crypt::decryptString($user->last_name);
                $user->middle_name = $user->middle_name ? Crypt::decryptString($user->middle_name) : null;
                $user->ext_name = $user->ext_name ? Crypt::decryptString($user->ext_name) : null;
                $user->address = Crypt::decryptString($user->address);
                $user->phone_number = Crypt::decryptString($user->phone_number);
            } catch (\Exception $e) {
                // If any field is not encrypted, leave it as is
            }
        }

        return view('auth.listofaccount', compact('users'));
    }
    public function certificate()
    {
        return view('auth.certificatelist');
    }
    public function track()
    {
        return view('auth.track');
    }
    public function audit()
    {
        return view('auth.audit');
    }
}