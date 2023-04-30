<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    use HttpResponses;
    public function register(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $this->success([

        ]);
    }
    public function login(LoginRequest $request){
        
        if (! Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Credential do not match','','401');
        }
        $user = Auth::user();
        return $this->success([
            'msg' => 'Login Was Successful',
            'data' => [
                'user' => $user,
                'token' => ''
            ]
        ]);
    }
}
