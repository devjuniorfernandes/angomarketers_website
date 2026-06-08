<?php

namespace App\Domain\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Por favor, introduza o seu nome.',
            'email.required' => 'Por favor, introduza o seu e-mail.',
            'email.email' => 'Por favor, introduza um e-mail válido.',
            'subject.required' => 'Por favor, indique o assunto da mensagem.',
            'message.required' => 'Por favor, escreva a sua mensagem.',
        ]);

        // In a real application, you would mail this message:
        // Mail::to('geral@angomarketers.com')->send(new ContactMessage($request->all()));

        return back()->with('contact_success', 'A sua mensagem foi enviada com sucesso! A nossa redação responderá o mais breve possível.');
    }
}
