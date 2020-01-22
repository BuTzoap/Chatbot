<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('users.index')->with('users',User::all());
        $users = User::all();
        // $roles = Role::all();
        return view('users.index' ,['user' => $users]);
        // dd('index');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('users.create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('id'));
        // $roles = Role::all();
        // return view('users.edit')->with([
        //     'user' => $user,
        //     'roles' => $roles
        // ]);
        // dd('index');
        // if (Auth::user()->id == $id) {
        //     // dd('index');   
        //     return view('users.edit')->with(['user' => User::find($id)]);
        // }
        // // dd('test');
        // return redirect()->route('user.index')->with('warning','You are not allowed to edit yourself.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        
        // dd($request);
        // $user->roles()->sync($request->roles);

        // return redirect()->route('user.edit', $user->id)->with('success', 'Successfully edited data.');
        // $this->validate($request,[
        //     'first'=>'required|max:8',
        //     'email'=>'required'
        //  ]);
        // User::where('id',$user->id)->update(['name'=> $request->first , 'email'=> $request->email]);
        // return redirect()->route('user.edit', $user->id)->with('success', 'Successfully edited data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // // dd($id);
        // if (Auth::user()->id == $id) {
        //     // dd('1');
        //     return redirect()->route('user.index')->with('warning', 'You are not allowed to delete yourself.');
        // }
        // // dd('2');
        // User::destroy($id);
        // return redirect()->route('user.index')->with('success' ,'User Has been deleted');
    }
}
