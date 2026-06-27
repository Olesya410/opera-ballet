<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Quiz;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('author', compact('authors'));
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
        //
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


    public function showDescription($id_author)
    {
        $author = Author::find($id_author);
        if (!$author) {
            abort(404, 'Автор не найден');
        }
        
        $questions = Quiz::where('id_author', $id_author)->where('type', 'quiz')->get();

        $strings = Quiz::where('id_author', $id_author)->where('type', 'lines')->get();

        $rebuses = Quiz::where('id_author', $id_author)->where('type', 'rebus')->get();

        return view('description', compact('author', 'questions', 'strings', 'rebuses'));
    }
}
