<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistrationEmail;

class RegisteredUserController extends Controller
{
    // View folder name
    protected $view = "admin.auth.register";

    // route name
    protected $route = "/";

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view($this->view);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|max:255|regex:/^[a-zA-Z]+$/',
                'last_name' => 'required|max:255|regex:/^[a-zA-Z]+$/',
                'email' => 'required|email|unique:users|max:255',
                'mobile' => 'required|regex:/^[0-9+]+$/|unique:users',
                'dob' => 'required|date|max:255',
                'account_type_id' => 'required|numeric',
                'country' => 'required|numeric',
                'terms' => 'required',
            ],
            [
                'first_name.required' => 'First Name is required',
                'first_name.regex' => 'First Name consist only alphabets or without space',
                'first_name.max' => 'First Name must be less then 255 characters',

                'last_name.required' => 'Last Name is required',
                'last_name.regex' => 'Last Name consist only alphabets or without space',
                'last_name.max' => 'Last Name must be less then 255 characters',

                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'email.unique' => 'Email already exists',
                'email.max' => 'Email must be less then 255 characters',

                'mobile.required' => 'Mobile Number is required',
                'mobile.regex' => 'Mobile is invalid',
                'mobile.unique' => 'Mobile already exists',
                'mobile.min' => 'Mobile must be at least 10 digits',
                'mobile.max' => 'Mobile must be less then 13 digits',

                'dob.required' => 'Date of birth is required',
                'dob.date' => 'Date of birth is invalid',
                'dob.max' => 'Date of birth must be less then 255 characters',

                'account_type_id.required' => 'Account type is required',
                'account_type_id.numeric' => 'Account type is invalid',

                'country.required' => 'Country is required',
                'country.numeric' => 'Country is invalid',

                'terms.required' => 'Terms and Condition is required',
                'terms.max' => 'Terms and Condition must be less then 255 characters',
            ],
        );

        if ($validator->fails()) {
            Session::flash('error', [
                'text' => $validator->errors()->first(),
            ]);
            return redirect()->back()->withInput();
        } else {


            // Create User
            $data = new User();
            $data->ib_status_id = 1;
            $data->kyc_status_id = 1;
            $data->user_status_id = 1;
            $data->account_type_id = $request->account_type_id;
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->dob = $request->dob;
            $data->country = $request->country;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->remember_token = $request->_token;

            if ($data->save()) {

                $result = true;
            }

            // Response
            if ($result) {
                // $mailData = [
                //     'verification_link' => env('APP_URL') . '/verify-email/' . $request->email . '/' . $request->_token,
                //     'first_name' => $request->first_name,
                //     'last_name' => $request->last_name,
                //     'email' => $request->email,
                //     'mt5Account' => $mt5TradingAccountNumber,
                //     'password' => $password,
                //     'masterPassword' => $masterPassword,
                //     'investorPassword' => $investorPassword,
                // ];

                // $emailSent = Mail::to($mailData['email'])->send(new UserRegistrationEmail($mailData));

                // if ($emailSent) {
                //     Session::flash('message', [
                //         'text' => "Verification mail sent successfully, verify for login",
                //     ]);
                // } else {
                //     Session::flash('error', [
                //         'text' => "Email could not sent.",
                //     ]);
                // }
                Session::flash('message', [
                    'text' => "Account Registerd!",
                ]);
                /**
                 * Log should not be added because auth user id undfined
                 */
                // LogActivity::addToLog($request, 'registered');
                return redirect()->route('login')->withInput();
            } else {
                Session::flash('error', [
                    'text' => "Something went wrong, please try again",
                ]);
                return redirect()->back()->withInput();
            }
        }
        return redirect()->back()->withInput();
    }
}
