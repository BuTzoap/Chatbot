<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; 
use App\Http\Resources\Users as UsersResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // public function register(Request $request){

    //     $validatedData = $request->validate([
    //         'name'=>'required|max:55',
    //         'email'=>'email|required|unique:users',
    //         'password'=>'required|confirmed'
    //     ]);

    //     $validatedData['password'] = bcrypt($request->password);
        
    //     $user = User::create($validatedData);
        
    //     $accessToken = $user->createToken('authToken')->accessToken;

    //     return response(['user'=> $user, 'access_token'=> $accessToken]);
    // }

    // public function login(Request $request){

    //     $loginData = $request->validate([
    //         'email'=>'email|required',
    //         'password'=>'required'
    //     ]);

    //     if(!auth()->attempt($loginData)){
    //         return response(['message'=>'Invalid credentials']);
    //     }

    //     $accessToken = auth()->user()->createToken('authToken')->accessToken;

    //     return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    // }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::orderBy('id', 'desc')->paginate(5);
        // Return collection of articles as a resource
        return UsersResource::collection($Users);
        

        // $users = User::orderBy('id', 'desc')->paginate(2);
        // return response()->json(['status'=> 'SUCCESS' , 'data' =>  $users]);




        // dd($users);
        // print_r($users);
        // return view('users.index')->with([
        //     'users' => $users
        // ]);


        // $auth = Auth::paginate(5);
        // return AuthResource::collection($auth);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return view('users.create');
        // $validatedData = $request->validate([
        //     'name'=>'required|max:55',
        //     'email'=>'email|required|unique:users',
        //     'password'=>'required|confirmed'
        // ]);

        // $validatedData['password'] = bcrypt($request->password);

        // $user = User::create($validatedData);
        
        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response(['user'=> $user, 'access_token'=> $accessToken]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users = $request->isMethod('put') ? User::findOrFail($request->user_id) : new User;

        $users->id = $request->user_id;
        $users->name = $request->name;
        $users->email = $request->email;
        $hashedPassword = bcrypt($request->password_confirmation);

        if(Hash::check($request->password , $hashedPassword)) {
            $users->password = $hashedPassword;
            if($users->save()) {
                $accessToken = $users->createToken('authToken')->accessToken;
                $users->accessToken = $accessToken;
                // return $accessToken;
                return new UsersResource($users);
            }
        }
        else {
            return response()->json(['status'=>'false','message'=>'password is correct']);
        }
        // $validatedData['password'] = bcrypt($request->password);
        // $users = $request->validate([
        //     'name'=>'required|max:55',
        //     'email'=>'email|required|unique:users',
        //     'password'=>'required|confirmed'
        // ]);
        // $users['password'] = bcrypt($request->password);

        // if($users = User::create($users)){
            // return new UsersResource($users);
        // }
        // if($Users->save()) {
        //     return new UsersResource($Users);
        // }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $user = new User();
        // $user->name=$request->get('name');
        // $user->email=$request->get('email');
        // $bcrypassword = bcrypt($request->get('password'));
        // $user->password=$bcrypassword;
        // // $user->password=$request->get('password');
        // // $user->password_confirmation=$request->get('password_confirmation');
        // $user->save();
        // return response()->json($user);
        // dd('index');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $validatedData = $request->validate([
        //     'name'=>'required|max:55',
        //     'email'=>'email|required|unique:users',
        //     'password'=>'required|confirmed'
        // ]);
        // // if ($validatedData->fails) {
        // //     return response()->json(['isvalid'=>false,'errors'=>$validatedData->messages()]);
        // // }

        // $validatedData['password'] = bcrypt($request->password);

        // $user = User::create($validatedData);
        
        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response(['user'=> $user, 'access_token'=> $accessToken]);
        

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////// ชุดนี้ทำได้ สำหรับ api
        //     $loginData = $request->validate([
        //     'email'=>'email|required',
        //     'password'=>'required'
        // ]);

        // if(!auth()->attempt($loginData)){
        //     return response(['message'=>'Invalid credentials']);
        // }

        // $accessToken = auth()->user()->createToken('authToken')->accessToken;

        // return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $users = User::findOrFail($id);

        // Return single article as a resource
        return new UsersResource($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $user = User::find($id);
        // $user->name=$request->get('name');
        // $user->email=$request->get('email');
        // $user->update();
        // return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Users = User::findOrFail($id);

        if($Users->delete()) {
            return new UsersResource($Users);
        }   
        // $user = User::find($id);
        // $user -> delete();
        // return response()->json($user);
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
