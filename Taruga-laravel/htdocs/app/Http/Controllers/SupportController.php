<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Arquivo opcional de anexo
        ]);

        // Dados para o e-mail
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Enviar o e-mail com anexo (se houver)
    Mail::send('emails.support', $data, function ($message) use ($request) {
        $message->to('suporte@empresa.com', 'Suporte')
                ->subject('Contato do Usuário');

        if ($request->hasFile('attachment')) {
            $message->attach($request->file('attachment')->getRealPath(), [
                'as' => $request->file('attachment')->getClientOriginalName(),
                'mime' => $request->file('attachment')->getMimeType(),
            ]);
        }
    });

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
