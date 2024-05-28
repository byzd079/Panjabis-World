<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $sells = Purchase::where('Users_userID', auth()->user()->id)->get();

        if(auth()->user()->role == "admin"){
            return view('denied');
        }
        return view('profiles.index', compact('sells'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = User::find(auth()->user()->id);

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('uploads/users', $filename, 'public');
                $user->photo = $filename;
            }

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'updated_at' => now()
            ]);
            if(auth()->user()->role == "admin"){
                return view('denied');
            }
            return redirect()->route('users.profile')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return back()->withErrors('Update failed: ' . $e->getMessage());
        }
    }
}