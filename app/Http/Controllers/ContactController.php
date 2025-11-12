<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // szerver oldali validáció
        $validated = $request->validate([
            'name'    => 'required|min:3|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'nullable|max:150',
            'message' => 'required|min:5',
        ]);

        // mentés az adatbázisba
        Message::create($validated);

        // visszairányítás és sikerüzenet
        return redirect()->route('contact.show')->with('success', 'Üzenetét sikeresen elküldte!');
    }
}
