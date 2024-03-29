<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EmailVerificationController extends Controller
{
    // public function FunctionName(): RedirectResponse
    public function verify(Request $request)
    {
        $verifyemail = User::where('email', $request->email)->where('remember_token', $request->token)->exists();
        if ($verifyemail) {
            $data = User::where('email', $request->email)->where('remember_token', $request->token)->update(
                [
                    'is_verified' => 1,
                    'email_verified_at' => now(),
                ]
            );
            if ($data) {
                Session::flash('message', [
                    'text' => "Your account verified successfully",
                ]);
            } else {
                Session::flash('error', [
                    'text' => "Something went wrong, please try again later",
                ]);
            }
        } else {
            Session::flash('error', [
                'text' => "Invalid Request",
            ]);
        }
        return redirect()->route('login');
    }
}
