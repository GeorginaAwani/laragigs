<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Show register form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Create new user
     */
    public function store(Request $request)
    {

        // get file from the request object using the file method and store using the store() method

        // get request body and validate
        $form = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // using 'confirmed' means the confirmation must be this field + _confirmation
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // has password
        $form['password'] = bcrypt($form['password']);

        // create user
        $user = User::create($form);

        // log in user with auth
        auth()->login($user);

        return redirect('/')->with('message', 'Account created successfully');
    }

    public function logout(Request $request)
    {
        // log user out using auth
        auth()->logout();

        // invalidate user session and regenerate csrf token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "You're now logged out");
    }

    /**
     * Load login view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * Log user in
     */
    public function authenticate(Request $request)
    {
        // get request body and validate
        $form = $request->validate([
            'email' => ['required', 'email'],
            // using 'confirmed' means the confirmation must be this field + _confirmation
            'password' => ['required'],
        ]);

        // attempt to log user
        if (auth()->attempt($form)) {
            // generate session id. Start new session
            $request->session()->regenerate();

            return redirect('/')->with('message', "You're now logged in");
        }

        // the onlyInput method shows the error in only field?
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
