<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginCustomer(Request $request)
    {   
        
        $data = $request ->validate([
            'email' => 'required|email|max:60',
            'password' => 'required|min:6',

        ]);

        $user = User::where('email' , $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password) || !$user->hasRole('customer') )

       
        {
            return response(['message' => 'Invalid credentials'],401);

        }
        else{
            $token = $user->createToken('tokenexamplelogincustomer')->plainTextToken;

            $response =[
                'user' => $user,
                'token' => $token
       
           ];


           
           return response($response , 200);
    

        }


        }    




        public function loginVendor(Request $request)
        {
            $data = $request ->validate([
                'email' => 'required|email|max:60',
                'password' => 'required|min:6',
    
            ]);
    
            $user = User::where('email' , $data['email'])->first();
    
            if(!$user || !Hash::check($data['password'], $user->password)  || !$user->hasRole('vendor'))
            {
                return response(['message' => 'Invalid credentials'],401);
    
            }
            else{
                $token = $user->createToken('tokenexampleloginvendor')->plainTextToken;
    
                $response =[
                    'user' => $user,
                    'token' => $token
           
               ];
    
               return response($response , 200);
        
    
            }
    
    
               
        }

}
