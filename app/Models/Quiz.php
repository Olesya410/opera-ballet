<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'id_quiz', 'stage', 'type', 'questions', 'img', 'option', 'answer', 'id_author'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'id_author');
    }
}