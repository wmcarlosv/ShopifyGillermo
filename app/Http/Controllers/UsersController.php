<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', Compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required',
            'password'=>'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);

        if($user->save()){
            Session::flash('success', 'Record Inserted successfully!!');
        }else{
            Session::flash('errors', 'An error has occurred!!');
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit', Compact('user'));
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required'
        ]);

        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if($user->save()){
            Session::flash('success', 'Record updated successfully!!');
        }else{
            Session::flash('errors', 'An error has occurred!!');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        if($user->delete()){
            Session::flash('success', 'Record Deleted successfully!!');
        }else{
            Session::flash('errors', 'An error has occurred!!');
        }

        return redirect()->route('users.index');
    }

    public function profile(){
        return view('admin.users.profile',['title'=>'Profile']);
    }

    public function update_profile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->update()){
            Session::flash('success', 'Record updated successfully!!');
        }else{
            Session::flash('errors', 'An error has occurred!!');
        }

        return redirect()->route('dashboard');
    }

    public function change_password(Request $request){
        $request->validate([
            'password'=>'required|same:password_confirmation',
            'password_confirmation'=>'required'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->password = bcrypt($request->password);
        if($user->update()){
            Session::flash('success', 'Record updated successfully!!');
        }else{
            Session::flash('errors', 'An error has occurred!!');
        }

        return redirect()->route('dashboard');
    }
}
