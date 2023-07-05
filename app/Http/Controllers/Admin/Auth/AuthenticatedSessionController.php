<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\LogActivity;
use App\Helpers\LoginHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'email.max' => 'Email must be less then 255 characters',

                'password.required' => 'Password is required',
            ],
        );

        if ($validator->fails()) {
            Session::flash('error', [
                'text' => $validator->errors()->first(),
            ]);
            return redirect()->back()->withInput();
        } else {
            $checkVerified = User::where('email', $request->email)->value('is_verified');
            $username = User::where('email', $request->email)->value('first_name') . ' ' . User::where('email', $request->email)->value('last_name');
            if ($checkVerified == 1) {

                $request->authenticate();
                $request->session()->regenerate();

                $username = User::where('email', $request->email)->value('first_name') . ' ' . User::where('email', $request->email)->value('last_name');
                Session::flash('message', [
                    'text' => "Login Successfully! Welcome " . $username,
                ]);
                return redirect()->intended(RouteServiceProvider::HOME);

            } else {
                Session::flash('error', [
                    'text' => "Email Account is not verified",
                ]);
                return redirect()->back();
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
