<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Quiz;

class QuizDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return view('description', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
     public function showDescription($id)
    {

        $author = Author::find($id);
        if (!$author) {
            abort(404, 'Автор не найден');
        }

        $questions = Quiz::where('id_author', $id)->where('type', 'question')->get();
        $strings = Quiz::where('id_author', $id)->where('type', 'string')->get();
        $rebuses = Quiz::where('id_author', $id)->where('type', 'rebus')->get();

        return view('description', compact('author', 'questions', 'strings', 'rebuses'));
    }
}
