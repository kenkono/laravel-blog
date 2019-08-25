<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function follow($id) {
        Auth::user()->following()->attach($id);

        return redirect()->back();
    }

    public function unfollow($id) {
        Auth::user()->following()->detach($id);

        return redirect()->back();
    }

    public function edit($id) {
        $user = User::find($id);

        return view('editUser', compact('user'));
    }

    public function editStore($id)
    {

        $user = Auth::user()->update([
            'name' => request()->name,
            'email' => request()->email,
        ]);


        // password check
        if(request()->password){

            request()->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);

            if(Hash::check(request()->current_password, Auth::user()->password)){
                Auth::user()->update([
                    'password' => Hash::make(request()->password)
                ]);
            } else {
                return "incorrect password";
            }
            
        }

        return redirect('home');
    }

    public function showFollowing(){
        $users = Auth::user()->following()->get();
        return view('users.followinglist', compact('users'));
    }
    public function showFollowers(){
        $users = Auth::user()->followers()->get();
        return view('users.followerslist', compact('users'));
    }
}
