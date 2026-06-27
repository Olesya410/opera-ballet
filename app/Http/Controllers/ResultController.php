<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function save(Request $request)
    {
        $data = $request->validate([
            'correct' => 'required|integer',
            'total' => 'required|integer',
            'wrongQuestions' => 'array'
        ]);

        $sessionId = uniqid('quiz_', true);

        session([$sessionId => [
            'correct' => $data['correct'],
            'total' => $data['total'],
            'wrongQuestions' => $data['wrongQuestions']
        ]]);

        return response()->json(['session_id' => $sessionId]);
    }

    public function show($session)
    {
        $results = session($session);
        if (!$results) {
            return redirect('/'); 
        }
        return view('results', [
            'score' => $results['correct'],
            'wrongQuestions' => $results['wrongQuestions']
        ]);
    }

}