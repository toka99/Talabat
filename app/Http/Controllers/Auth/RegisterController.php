<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerCustomer(Request $request)
    {
        $data = $request ->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'mobile_number' => 'required|digits:12|numeric',

        ]);

        $user= USER::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'account_status' => 'Active',
            'mobile_number' => $data['mobile_number']

        ]);


    $token = $user->createToken('tokenexample')->plainTextToken;

    $response =[
         'user' => $user,
         'token' => $token

    ];

    
    $user->assignRole('customer');
    

    

    return response($response, 201);

    }








    public function registerVendor(Request $request)
    {
        $data = $request ->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|max:60|unique:users,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'mobile_number' => 'required|digits:12|numeric',

        ]);

        $user= USER::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'account_status' => 'Active',
            'mobile_number' => $data['mobile_number']

        ]);


    $token = $user->createToken('tokenexample')->plainTextToken;

    $response =[
         'user' => $user,
         'token' => $token

    ];

    
    $user->assignRole('vendor');
    

    

    return response($response, 201);

    }


}