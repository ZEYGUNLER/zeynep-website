<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|min:10',
        ]);

        // Şimdilik sadece başarı mesajı dönelim
        return back()->with('success', 'Mesajınız başarıyla gönderildi.');
    }
}