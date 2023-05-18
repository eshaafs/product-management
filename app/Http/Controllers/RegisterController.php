<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => ['required','confirmed', 
                Password::min(8)->numbers()->symbols()->mixedCase()]
        ]);

        // Encrypt password
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull! Please login!');
        return redirect('/login')->with('success', 'Registration successfull! Please login!');
    }

}
