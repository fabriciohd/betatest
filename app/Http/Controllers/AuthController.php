<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function unauthorized() {
        return response()->json([
            'error' => 'Não autorizado'
        ], 401);
    }

    public function register(Request $request) {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        if (!$validator->fails()) {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');

            $hash = Hash::make($password);

            $newUser = new User;
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $hash;
            $newUser->remember_token = Str::random(10);
            $newUser->save();

            $token = $newUser->createToken('User Token')->accessToken;
            $array['user'] = $newUser;
            $array['token'] = $token;
        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function login(Request $request) {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validator->fails()) {
            $email = $request->input('email');
            $password = $request->input('password');            

            $user = User::where('email', $email)->first();
            if ($user && Hash::check($password, $user->password)) {
                $token = $user->createToken('User token')->accessToken;
                $array['user'] = $user;
                $array['token'] = $token;
            } else {                
                $array['error'] = 'Usuário e/ou Senha incorretos';
                return response()->json($array, 422);
            }

        } else {
            $array['error'] = $validator->errors()->first();
            return response()->json($array, 422);
        }

        return $array;
    }

    public function logout (Request $request) {
        $array = ['error' => ''];

        $token = $request->user()->token();
        $token->revoke();
        $array['message'] = 'You have been successfully logged out!';

        return $array;
    }
}
