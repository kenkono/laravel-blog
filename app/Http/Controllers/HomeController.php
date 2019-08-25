<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Auth::user()->blogs()->orderBy('updated_at', 'desc')->get();
        return view('home', compact('blogs'));
    }

    public function showUsers() {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store() {
        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->content = request()->content;
        $blog->save();

        return redirect('home');
    }

    public function delete($id) {
        Blog::find($id)->delete();
        
        return redirect('home');
    }

    public function edit($id)
    {

        $blog = Blog::whereId($id)->first();

        return view('editPost', compact('blog'));
    }

    public function editStore($id)
    {

        $blog = Blog::find($id)->update([
            'user_id' => Auth::user()->id,
            'content' => request()->content,
        ]);

        return redirect('home');
    }

    public function showUser($id)
    {
        
        $user = User::find($id);
        $blogs = $user->blogs;
        return view('users.userinfo', compact('blogs', 'user'));
    }
}