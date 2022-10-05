<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    //Create new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'company_id' => 'required',
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created successfully');
    }

    //Create new user
    public function update(Request $request, User $user) {
        $formFields = $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user->update($formFields);

        return back()->with('message', 'User updated successfully');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User logged out successfully');
    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            $user_type = User::find(auth()->id())->company_id;
            if ($user_type == 'admin') {
                return redirect('/admin/controlpanel')->with('message', 'You are now logged in as admin');
            } else {
                return redirect('/slides/manage')->with('message', 'You are now logged in');
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


}
