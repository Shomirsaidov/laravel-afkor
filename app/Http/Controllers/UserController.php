<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new user and log them in.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $messages = [
            'name.required' => 'Поле имени обязательно для заполнения.',
            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Электронная почта должна быть действительным адресом.',
            'email.unique' => 'Такой пользователь уже существует.',
            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.min' => 'Пароль должен быть не менее 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ];
    
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $messages);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Log in the user
        Auth::login($user);

        // Check if the user is authenticated
        if (Auth::check()) {
            return view('profile');
        } else {
            return response()->json(['message' => 'Не удалось войти в систему'], 401);
        }
    }

    /**
     * Log in an existing user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $messages = [
            'tel.required' => 'Поле телефона обязательно для заполнения.',
            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.min' => 'Пароль должен быть не менее 8 символов.',
        ];

        // Validate the request data
        $request->validate([
            'tel' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], $messages);

        // Attempt to authenticate the user
        $credentials = $request->only('tel', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return view('profile');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['password' => 'Неверный пользователь или пароль.']);
        }
    }
}
