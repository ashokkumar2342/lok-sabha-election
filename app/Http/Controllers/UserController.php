<?php

namespace App\Http\Controllers;

use App\PCDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
          $pcdetails=PCDetails::all();
        return view('admin.user.list',compact('users','pcdetails'));
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

    public function showTable()
    {
         $users = User::all();
         return view('admin.user.userTable',compact('users'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $rules=[

         'email' => 'required|unique:users',
         "password" => 'required',
         "role" => 'required',
       
         ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
           
           $user = new User();
          $user->name=$request->name;
          $user->email=$request->email;
          $user->password=Hash::make($request->password);
          $user->role=$request->role;
          $user->pc_code=$request->pc_code;
          $user->ac_code=$request->ac_code; 
          $user->save();
          $response=array();
          $response["status"]=1;
          $response["msg"]='Add  Successfully';
          return $response;
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
         
        return view('admin.user.user_edit',compact('user'));
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
           $rules=[

         'email' => 'required',
         "password" => 'required',
          
        
         ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
           
        
          $user->name=$request->name;
          $user->email=$request->email;
          $user->password=Hash::make($request->password); 
          $user->save();
          $response=array();
          $response["status"]=1;
          $response["msg"]='Update  Successfully';
          return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   $user->delete();
        $response=array();
        $response["status"]=1;
        $response["msg"]='Delete Successfully';
        return $response;
    }
}
