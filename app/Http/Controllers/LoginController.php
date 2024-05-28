<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login(){
        if(Auth::check()){

            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            else{
                return redirect()->route('user.dashboard');
            }
        }
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role=='user'){
                return redirect()->route('user.dashboard');
            }
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with("error", "Invalid credentials");
    }

    function register(){
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('uploads/users', $filename, 'public');
            $user->photo = $filename;
        }

        $name = $request->input('name');

        $user->name = $name;
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->password);
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->role = 'user';

        $user->save();

        return redirect()->route('login')->with('success', 'Customer created successfully.');
    }

    function logout(){
        session()->flush();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
