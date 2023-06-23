<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    
     /**
     * Display a listing of the resource.
     */

     public function index()
     {
         //
         $data =  User::all();
         return response()->json($data);
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         //
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         //
         $data = new User();
         $data->name = $request->name;
         $data->email = $request->email;
         $data->password = Hash::make($request->password);
         $data->role = $request->role;
         $data->actions = $request->actions;
         $data->cd_client_id = $request->cd_client_id;
         $data->cd_brand_id = $request->cd_brand_id;
         $data->cd_branch_id = $request->cd_branch_id;
         $data->is_active = $request->is_active;
         $data->created_by = $request->created_by;
         $data->updated_by = $request->updated_by;
         $data->save();
         
         return response()->json($data);
     }
 
     /**
      * Display the specified resource.
      */
     public function show(User $User)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit( $id)
     {
         $data = User::find($id);
         return response()->json($data);
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, $id)
     {
         $data =  User::find($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->password = Hash::make($request->password);
         $data->role = $request->role;
         $data->actions = $request->actions;
         $data->is_active = $request->is_active;
         $data->created_by = $request->created_by;
         $data->updated_by = $request->updated_by;
         $data->save();
         
         return response()->json($data);
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         $data = User::find($id);
         $data->delete();
         return response()->json($data);
     } 

     
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 401);
        }
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;
    
            return response()->json(['token' => $token, 'user' => $user], 200);
        }
    
        return response()->json(['message' => 'Email or password is incorrect'], 401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userDetails(): Response
    {
        if (Auth::check()) {

            $user = Auth::user();

            return Response(['data' => $user],200);
        }

        return Response(['data' => 'Unauthorized'],401);
    }

    /**
     * Display the specified resource.
     */
    public function logout(): Response
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
        
        return Response(['data' => 'User Logout successfully.'],200);
    }

  
}
