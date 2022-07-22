<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->orderBy('updated_at','desc')->get();
        return view('backend.User.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $validateData = $request->validate(array(
            'name' => 'required',
            'email' => 'bail|required|email',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ));

        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/images'),$image_name);
    
        $image_path = "/images/" . $image_name;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $image_path;

        $user->save();
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }

    public function login()
    {
        return view('backend.Home.login');
    }

    public function checklogin(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            return back()->with('sms', 'Email does not exist !!');
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home')->with('sms', 'Login Success!!!');
            } else {
                return back()->with('sms', 'Password in correct !!! Please try again');
            }
        }
    }

    public function register()
    {
        return view('backend.Home.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
