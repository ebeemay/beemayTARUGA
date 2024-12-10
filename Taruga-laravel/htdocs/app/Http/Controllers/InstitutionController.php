<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{
    public function registerInstitution(Request $request)
{
    
    $request->validate([
        'nome' => 'required|string|max:255',
        'cnpj' => 'required|string|unique:institution,cnpj',
        'email' => 'required|email|unique:institution,email',
        'endereco' => 'required|string',
        'telefone' => 'required|string',
        'senha' => 'required|string|confirmed',
    ]);

    $institution = Institution::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'cnpj' => $request->cnpj,
        'endereco' => $request->endereco,
        'telefone' => $request->telefone,
        'senha' => bcrypt($request->senha),
    ]);

    return redirect()->route('identification')->with('success', 'Cadastro realizado com sucesso!');
}
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'senha' => 'required|string',
    ]);

    $institution = Institution::where('email', $request->email)->first();

    if ($institution && Hash::check($request->senha, $institution->senha)) {

        Auth::guard('institution')->login($institution);
        return redirect()->route('HomeInstitution');
    }

    return back()->withErrors([
        'email' => 'Email ou senha incorretos. Tente novamente!',
    ]);
}

public function institutionList()
{
    $institution = auth('institution')->user();

    if (!$institution) {
        return response()->json(['error' => 'Instituição não autenticada'], 401);
    }

    $teachers = $institution->teachers;


    return view('usersList', compact('teachers'));
}
    
}
