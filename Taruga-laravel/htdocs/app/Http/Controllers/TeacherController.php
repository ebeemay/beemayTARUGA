<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{

public function registerTeacher(Request $request)
{
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'rp' => 'required|string|unique:teacher,rp',
            'email' => 'required|email|unique:teacher,email',
            'senha' => 'required|string',
        ]);

        // Verificar o Institution autenticado
        $institution = auth('institution')->user();

        if (!$institution) {
         return response()->json(['error' => 'Usuário não autenticado'], 403);
        } // Certifique-se de que o guard está configurado corretamente

        // Criar o Teacher e associá-lo ao Institution
        $teacher = $institution->teachers()->create([
            'nome' => $validatedData['nome'],
            'rp' => $validatedData['rp'],
            'email' => $validatedData['email'],
            'senha' => bcrypt($validatedData['senha']), // Use bcrypt para armazenar a senha de forma segura
        ]);

        return redirect()->back()->with('success', 'Professor criado com sucesso!');
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'rp' => 'required|string|unique:teacher,rp,' . $id, // Permite o RP atual
        'email' => 'required|email|unique:teacher,email,' . $id, // Permite o email atual
    ]);

    $teacher = Teacher::findOrFail($id);

    // Verifica se o professor pertence à instituição autenticada
    $institution = auth('institution')->user();
    if ($teacher->fk_instituicao_id !== $institution->id) {
        return redirect()->back()->with('error', 'Ação não permitida.');
    }

    $teacher->update($validatedData);

    return redirect()->route('institution.list')->with('success', 'Professor atualizado com sucesso!');
}

public function destroy($id)
{
    $teacher = Teacher::findOrFail($id);

    // Verifica se o professor pertence à instituição autenticada
    $institution = auth('institution')->user();
    if ($teacher->fk_instituicao_id !== $institution->id) {
        return redirect()->back()->with('error', 'Ação não permitida.');
    }

    $teacher->delete();

    return redirect()->route('institution.list')->with('success', 'Professor excluído com sucesso!');
}

public function search(Request $request)
{
    $institution = auth('institution')->user();
    

    if (!$institution) {
        return redirect()->route('login')->with('error', 'Usuário não autenticado.');
    }

    // Captura o termo de pesquisa
    $search = $request->input('search');

    // Busca professores da instituição com base no termo
    $teachers = Teacher::where('fk_instituicao_id', $institution->id)
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%")
                  ->orWhere('rp', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        })
        ->get();

        return view('usersList', compact('teachers', 'search'));
}

public function teacherList()
{
    $teacher = auth('teacher')->user();

    if (!$teacher) {
        return response()->json(['error' => 'Professor não autenticado'], 401);
    }

    $students = $teacher->students;


    return view('usersList', compact('students'));
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'senha' => 'required|string',
    ]);

    $teacher = Teacher::where('email', $request->email)->first();

    if ($teacher && Hash::check($request->senha, $teacher->senha)) {
        

        if ($teacher->precisa_atualizar_senha) {
            return response()->json(['message' => 'É necessário atualizar a senha.']);
        }

        Auth::guard('teacher')->login($teacher);
        return redirect()->route('HomeTeacher');
        //return response()->json(['message' => 'Login realizado com sucesso.']);
    }

    return back()->withErrors([
        'email' => 'Email ou senha incorretos. Tente novamente!',
    ]);
}

public function UpdatePassword(Request $request)
{
    $request->validate([
        'nova_senha' => 'required|min:8|confirmed', // campo de confirmação
    ]);

    $teacher = Auth::guard();

    if ($teacher->precisa_atualizar_senha) {
        $teacher->senha = bcrypt($request->nova_senha);
        $teacher->precisa_atualizar_senha = false;
        $teacher->save();

        return response()->json(['message' => 'Senha atualizada com sucesso.']);
    }

    return response()->json(['message' => 'A senha já foi atualizada anteriormente.']);
}


}