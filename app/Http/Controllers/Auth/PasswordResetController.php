<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class PasswordResetController extends Controller
{
    /**
     * Show the password reset form.
     */
    public function showResetForm()
    {
        return view('auth.password');
    }

    /**
     * Handle the password reset request.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully. You can now log in with your new password.');
    }
}
