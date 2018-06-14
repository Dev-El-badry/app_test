<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Hash;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('manage.users.index')->withUsers($users);
    }

    public function random_string($length) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand_string = '';
        for ($i=0; $i < $length; $i++) { 
            $rand_string .= $characters[rand(0, strlen($characters) -1)];
        }

        return $rand_string;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users'
        ]);
        
        if($request->has('password') AND !empty($request->password)) {
            $password = trim($request->password);
        } else {
            $str = $this->random_string(10);
            $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();

        if ($request->role_selected) {
            $user->syncRoles(explode(',', $request->role_selected));
        }

        return redirect()->route('users.index');
        // if($user->save()) {
        //     return redirect()->route('users.index');
        // } else {
        //     Session::flash('danger', 'Sorry Problem Occure While Creating User. ');
        //     return redirect()->route('users.create');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id',$id)->with('roles')->first();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password_options == 'auto') {
            $str = $this->random_string(10);
            $password = $str;
            $user->password = Hash::make($password);
        } elseif($request->password_options == 'manual') {
            $password = $request->password;
            $user->password = Hash::make($password);
        }

        $user->save();

        $user->syncRoles(explode(',', $request->role_selected));
        return redirect()->route('users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
