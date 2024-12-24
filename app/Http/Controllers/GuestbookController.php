<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;
use App\Models\ProhibitedWords;

class GuestbookController extends Controller
{
    public function index()
    {
        $messages = Guestbook::all();
        $prohibitedWords = ProhibitedWords::all();
        return view('guestbook.index', compact('messages', 'prohibitedWords'));
    }

    public function store(Request $request)
    {
        $message = htmlspecialchars(trim($request->input('message')));
        $name = htmlspecialchars(trim($request->input('name')));

        if (empty($name) || empty($message)) {
            return redirect('/guestbook')->with('error', 'Both fields are required!');
        }
        
        // Check if the message contains any prohibited words
        foreach (ProhibitedWords::all() as $record) {
            if (strpos($message, $record->word) !== false || strpos($name, $record->word) !== false) {
                $prohibitedWordUsed = true;
                break;
            }
        }
    
        if ($prohibitedWordUsed) {
           return redirect('/guestbook')->with('error', 'Prohibited word detected: ' . $record->word);
        }

        // Save the message to the database
        Guestbook::create([
            'name' => $name,
            'message' => $message
        ]);

        return redirect('/guestbook');
    }
}
