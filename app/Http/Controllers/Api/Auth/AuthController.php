<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|string|max:191|unique:users,email',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        $token = $user->createToken('calculatorToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged out successfully']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required_without:username',
            'password'=>'required'
        ]);
        if($request['email']){
            $user = User::where('email',$data['email'])->first();
        }

        if(!$user || !Hash::check($data['password'],$user->password)){
            return response(['message'=>'Invalid Credentials!']);
        }
        else{
            $token = $user->createToken('calculatorTokenLogin')->plainTextToken;
            $response = [
                'user'=>$user,
                'token'=>$token
            ];

            $response = [
                'token_type' => 'Bearer',
                'token' => $token,
                'user' => new UserResource($user)
            ];
            return response($response,200);
        }
    }

    public function me()
    {
        try {
            $user = Auth::user();
        } catch (ModelNotFoundException $e) {
            return $this->respondNotFound();
        }

        return new UserResource($user);
    }
}
