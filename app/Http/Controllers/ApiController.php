<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;



class ApiController extends Controller
{
    public function obtenerUsuario(Request $request) {
        return $request->user();
    }
    public function obtenerUsuarioUpdate(Request $request) {
        $user=$request->user();
        if ($user->tokenCan('server:update')) {
            return $request->user();
        } else {            
            return ['error'=>'no tiene la abilidad'];
        }
        
    }
    public function crearToken(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken('token',['server:update'])->plainTextToken;
    }
    
    public function crearTokenLimitado(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken('token',['server:read'])->plainTextToken;
    }
}
