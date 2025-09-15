<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function showCadastroForm()
    {
        return view('cadastro');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'cpf' => 'required|string|max:11',
            'senha' => 'required|string|min:6',
        ]);
        $request->merge(['senha' => Hash::make($request->senha)]);
        Usuario::create($request->all());
        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('inicio');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput();
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        if ($request->has('senha')) {
            $request->merge(['senha' => Hash::make($request->senha)]);
        }
        $usuario->update($request->all());
        return $usuario;
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->noContent();
    }
}