<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user-management.user_data',compact('users'));
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
       
       $users = $this->validate($request,[
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'min:6|required|confirmed',
       ]);
       
      
       if ($request->hasFile('image'))
        {
           $image =request('image')->getClientOriginalName();
           $file = $request->file('image')->storeAs('public/images', $image);
           $users['image'] = $image;
           
       }
       $users['role'] = $request->role; 
       $users['password'] = bcrypt($request->password); 
        
       User::create($users);
       return back()->with('success','User is added Successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user-management.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $users = $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
    
        ]);
        if ($request->hasFile('image'))
        {
           $image =request('image')->getClientOriginalName();
           $file = $request->file('image')->storeAs('public/images', $image);
           $users['image'] = $image;
          }

          $user->first_name = $request->first_name;
          $user->last_name = $request->last_name;
          $user->email = $request->email;
          $user->role = $request->role;
          $user->image =$users['image'] ?? '';
        
          $user->save();
          return redirect()->route('users.index')->with('success','User is added Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
