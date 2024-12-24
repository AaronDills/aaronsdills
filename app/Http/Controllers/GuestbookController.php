<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;
use App\Models\ProhibitedWords;
use Illuminate\Support\Str;
class GuestbookController extends Controller
{
    public function index()
    {
        $messages = Guestbook::all()->sortByDesc('created_at')->take(10);
        $prohibitedWords = ProhibitedWords::all();
        return view('guestbook.index', compact('messages', 'prohibitedWords'));
    }

    public function store(Request $request)
    {
        $message = htmlspecialchars(trim($request->input('message')));
        $name = htmlspecialchars(trim($request->input('name')));

        if (empty($name) || empty($message)) {
            $error = 'Both fields are required';
            $messages = Guestbook::all()->sortByDesc('created_at')->take(10);
            return view('guestbook.index', compact('error', 'messages'));
        }
        
        // Check if the message contains any prohibited word
        if(Str::contains(strtolower($message), ProhibitedWords::all()->pluck('word')) || Str::contains(strtolower($name), ProhibitedWords::all()->pluck('word'))) {
            $error = 'Please do not use any inappropriate words';
            $messages = Guestbook::all()->sortByDesc('created_at')->take(10);
            return view('guestbook.index', compact('error', 'messages'));
        }

        // Save the message to the database
        Guestbook::create([
            'name' => $name,
            'message' => $message
        ]);

        return redirect('/guestbook');
    }
}
