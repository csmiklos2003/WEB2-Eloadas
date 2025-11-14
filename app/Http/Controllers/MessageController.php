<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // vagy ahogy az üzenetek modellje van elnevezve

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }
}
