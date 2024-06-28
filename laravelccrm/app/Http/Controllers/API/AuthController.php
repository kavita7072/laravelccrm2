<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        //validation

        $validator = validator::make( $request->all(),[
            'user_id'=> 'required',
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            

        ]);
        
        if($validator->fails()){
            $response = [
                'success' => false,
                'message'=> $validator->error()
            ];
            return response()->json($response,400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message'=> 'user register successfully' 
        ];

        return response()->json($response,200); 

    }

        public function login(Request $request){
            $validator = validator::make( $request->all(),[
                
                'user_id'=> 'required',
                'password'=> 'required',
                 
            ]);
            if(Auth::attempt(['user_id'=>$request->user_id,'password'=>$request->password]))
            {  
               $user = Auth::user();
               
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message'=> 'user login successfully' 
        ];
        return response()->json($response,200); 
    }else{
        $response = [
            'success' => false,
            'message'=> 'Unauthorised' 
            
        ];
        return response()->json($response); 
        } 
    }
}
