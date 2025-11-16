<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); 
        return view('perfil', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14', 
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->nome = $request->nome;
        $user->cpf = $request->cpf;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('perfil.edit')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
}
