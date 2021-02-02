<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class ApiAuthControler extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required | string | max:255',
            'email' => 'required | email | max:255',
            'password' => 'required | string | min:5 | max:25'
        ]);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return Response::json($errors);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth-token');

        $plainToken = $token->plainTextToken;

        return Response::json([
            'token' => $plainToken
        ]);
    }
}
