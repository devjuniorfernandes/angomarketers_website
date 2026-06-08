<?php

namespace App\Domain\Newsletter\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Newsletter\Actions\SubscribeNewsletterAction;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request, SubscribeNewsletterAction $action)
    {
        $request->validate([
            'whatsapp' => 'required|string|min:9|max:20|unique:subscribers,whatsapp',
        ], [
            'whatsapp.required' => 'Por favor, introduza o seu número de WhatsApp.',
            'whatsapp.min' => 'O número de WhatsApp deve ter pelo menos 9 caracteres.',
            'whatsapp.max' => 'O número de WhatsApp não pode ter mais de 20 caracteres.',
            'whatsapp.unique' => 'Este número de WhatsApp já se encontra registado.',
        ]);

        $action->execute($request->input('whatsapp'));

        return back()->with('newsletter_success', 'Inscrição efetuada com sucesso! Receberá novidades diretamente no seu WhatsApp.');
    }
}
