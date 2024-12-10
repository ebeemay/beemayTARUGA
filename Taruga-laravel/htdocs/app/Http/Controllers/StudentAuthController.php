<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class StudentAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('students.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:55',
            'ra' => 'numeric|unique:student,ra',
            'email' => 'required|email|unique:student,email',
            'senha' => 'required|string',
            'situacao' => 'required|in:Ouvinte,Não-ouvinte',
        ]);

        $student = Student::create([
            'nome' => $request->nome,
            'ra' => $request->ra,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'situacao' => $request->situacao,
        ]);

        Auth::logout();
        session(['user_type' => null]);
        return redirect()->route('student.identification')->with('success', 'Cadastro realizado com sucesso! Faça o login para acessar.');
    }

    public function showLoginForm()
    {
        return view('identification');
    }

    public function registerStudent(Request $request)
{

    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'ra' => 'required|string|unique:student,ra',
        'email' => 'required|email|unique:student,email',
        'senha' => 'required|string',
        'situacao' => 'nullable|string',
    ]);

    // Obtenha o professor autenticado
    $teacher = auth('teacher')->user();

    if (!$teacher) {
        return response()->json(['error' => 'Usuário não autenticado'], 403);
    }

    // Criar o estudante e associá-lo ao professor
    $student = $teacher->students()->create([
        'nome' => $validatedData['nome'],
        'ra' => $validatedData['ra'],
        'email' => $validatedData['email'],
        'senha' => bcrypt($validatedData['senha']), // Armazene a senha de forma segura
        'situacao' => $validatedData['situacao'] ?? 'Ouvinte',
    ]);

    return redirect()->back()->with('success', 'Professor criado com sucesso!');
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'nullable|string|max:255',
        'ra' => 'nullable|string|unique:student,ra,' . $id, 
        'email' => 'nullable|email|unique:student,email,' . $id, 
        'situacao' => 'nullable|string',
    ]);

    $teacher = auth('teacher')->user();

    if (!$teacher) {
        return response()->json(['error' => 'Usuário não autenticado'], 403);
    }

    // Encontre o estudante associado ao professor
    $student = $teacher->students()->where('id', $id)->first();

    if (!$student) {
        return response()->json(['error' => 'Estudante não encontrado ou não pertence a este professor'], 404);
    }

    // Atualize os dados do estudante
    $student->update($validatedData);

    return redirect()->route('teacher.list')->with('success', 'Professor atualizado com sucesso!');
}

public function delete($id)
{
    $student = Student::findOrFail($id);

    // Verifica se o professor pertence à instituição autenticada
    $teacher = auth('teacher')->user();
    if ($student->fk_professores_id !== $teacher->id) {
        return redirect()->back()->with('error', 'Ação não permitida.');
    }

    $student->delete();

    return redirect()->route('teacher.list')->with('success', 'Professor excluído com sucesso!');
}

public function search(Request $request)
{
    $teacher = auth('teacher')->user();
    

    if (!$teacher) {
        return redirect()->route('login')->with('error', 'Usuário não autenticado.');
    }

    // Captura o termo de pesquisa
    $search = $request->input('search');

    // Busca professores da instituição com base no termo
    $students = Student::where('fk_professores_id', $teacher->id)
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%")
                  ->orWhere('ra', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        })
        ->get();

        return view('usersList', compact('students', 'search'));
}
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);
    
        // Localizar o estudante pelo Email
        $student = Student::where('email', $request->email)->first();
    
        if ($student && Hash::check($request->senha, $student->senha)) {
            // Realizar o login usando o guard 'student'
            Auth::guard('student')->login($student);
            return redirect()->route('HomeStudent');
        }
    
        return back()->withErrors([
            'email' => 'Email ou senha incorretos. Tente novamente!',
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login');
    }

    

}
