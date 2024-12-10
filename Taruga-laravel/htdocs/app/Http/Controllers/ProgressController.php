<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Progress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ProgressController extends Controller
{

    private $statusToViewMap = [
        0 => 'students.activities.firstActivity.firstScreen',    
        15 => 'students.activities.firstActivity.secondScreen',   
        30 => 'students.activities.firstActivity.thirdScreen',   
        50 => 'students.activities.firstActivity.preActivity',   
        100 => 'students.activities.firstActivity.activity',    
    ];

    private $statusToViewMapPt = [
        0 => 'students.activities.firstActivityPort.contentPart1',    
        15 => 'students.activities.firstActivityPort.contentPart2',   
        30 => 'students.activities.firstActivityPort.gamePart1',   
        50 => 'students.activities.firstActivityPort.gamePart2',   
    ];

    public function iniciarProgresso($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Verifica se já existe progresso para essa matéria e atividade
    $progress = Progress::firstOrCreate(
        [
            'materia' => $materia,
            'numeroAtividade' => $numeroAtividade,
            'fk_estudantes_id' => $student->id,
        ],
        [
            'status' => 0, // Progresso inicial em 0%
        ]
    );

    // Redireciona para a view correspondente
    return redirect()->route('atividade.view', ['materia' => $materia, 'numeroAtividade' => $numeroAtividade]);
}

public function iniciarProgressoPt($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Verifica se já existe progresso para essa matéria e atividade
    $progress = Progress::firstOrCreate(
        [
            'materia' => $materia,
            'numeroAtividade' => $numeroAtividade,
            'fk_estudantes_id' => $student->id,
        ],
        [
            'status' => 0, // Progresso inicial em 0%
        ]
    );

    // Redireciona para a view correspondente
    return redirect()->route('atividade.viewPt', ['materia' => $materia, 'numeroAtividade' => $numeroAtividade]);
}
    public function getProgress($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    $progress = Progress::where('materia', $materia)
                        ->where('numeroAtividade', $numeroAtividade)
                        ->where('fk_estudantes_id', $student->id)
                        ->first();

    if ($progress) {
        $viewName = $this->statusToViewMap[$progress->status] ?? 'students.modules'; // Nome da view baseado no status
        return response()->json([
            'status' => 'success',
            'message' => 'Progresso encontrado',
            'data' => [
                'status' => $progress->status,
                'view' => $viewName
            ]
        ]);
    }

    // Caso não exista progresso, começa da primeira view
    return response()->json([
        'status' => 'success',
        'message' => 'Nenhum progresso encontrado, iniciando do início',
        'data' => [
            'status' => 0,
            'view' => 'view_inicio'
        ]
    ]);
}

public function getProgressPt($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    $progress = Progress::where('materia', $materia)
                        ->where('numeroAtividade', $numeroAtividade)
                        ->where('fk_estudantes_id', $student->id)
                        ->first();

    if ($progress) {
        $viewName = $this->statusToViewMapPt[$progress->status] ?? 'students.modulesPt'; // Nome da view baseado no status
        return response()->json([
            'status' => 'success',
            'message' => 'Progresso encontrado',
            'data' => [
                'status' => $progress->status,
                'view' => $viewName
            ]
        ]);
    }

    // Caso não exista progresso, começa da primeira view
    return response()->json([
        'status' => 'success',
        'message' => 'Nenhum progresso encontrado, iniciando do início',
        'data' => [
            'status' => 0,
            'view' => 'view_inicio'
        ]
    ]);
}
    
public function updateProgress(Request $request)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Valida os dados da requisição
    $request->validate([
        'materia' => 'required|string',
        'numeroAtividade' => 'required|integer',
        'status' => 'required|integer|min:0|max:100',
    ]);

    // Busca ou cria o progresso
    $progress = Progress::firstOrCreate(
        [
            'materia' => $request->materia,
            'numeroAtividade' => $request->numeroAtividade,
            'fk_estudantes_id' => $student->id,
        ],
        [
            'status' => 0, // Progresso inicial caso não exista
        ]
    );

    // Atualiza o status do progresso
    $progress->status = $request->status;
    $progress->save();

    $nextView = $statusToViewMap[$progress->status] ?? 1;

    return response()->json([
        'status' => 'success',
        'message' => 'Progresso atualizado com sucesso',
        'next_url' => route('atividade.view', ['materia' => $request->materia, 'numeroAtividade' => $nextView])
    ]);
}

public function updateProgressPt(Request $request)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Valida os dados da requisição
    $request->validate([
        'materia' => 'required|string',
        'numeroAtividade' => 'required|integer',
        'status' => 'required|integer|min:0|max:100',
    ]);

    // Busca ou cria o progresso
    $progress = Progress::firstOrCreate(
        [
            'materia' => $request->materia,
            'numeroAtividade' => $request->numeroAtividade,
            'fk_estudantes_id' => $student->id,
        ],
        [
            'status' => 0, // Progresso inicial caso não exista
        ]
    );

    // Atualiza o status do progresso
    $progress->status = $request->status;
    $progress->save();

    $nextView = $statusToViewMapPt[$progress->status] ?? 1;

    return response()->json([
        'status' => 'success',
        'message' => 'Progresso atualizado com sucesso',
        'next_url' => route('atividade.viewPt', ['materia' => $request->materia, 'numeroAtividade' => $nextView])
    ]);
}


public function exibirAtividade($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Busca o progresso
    $progress = Progress::where('materia', $materia)
                        ->where('numeroAtividade', $numeroAtividade)
                        ->where('fk_estudantes_id', $student->id)
                        ->first();

    $viewName = $progress ? ($this->statusToViewMap[$progress->status] ?? 'students.modules') : 'students.modules';

    // Retorna a view correspondente
    return view($viewName, compact('materia', 'numeroAtividade'));
}

public function exibirAtividadePt($materia, $numeroAtividade)
{
    $student = auth('student')->user(); // Obtém o estudante logado

    // Busca o progresso
    $progress = Progress::where('materia', $materia)
                        ->where('numeroAtividade', $numeroAtividade)
                        ->where('fk_estudantes_id', $student->id)
                        ->first();

    $viewName = $progress ? ($this->statusToViewMapPt[$progress->status] ?? 'students.modulesPt') : 'students.modulesPt';

    // Retorna a view correspondente
    return view($viewName, compact('materia', 'numeroAtividade'));
}

}