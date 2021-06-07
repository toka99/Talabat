<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {    
        $this->middleware('guest')->except('logout');
    }










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
