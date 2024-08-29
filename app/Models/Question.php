<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'questions';
    protected $fillable = [
        'chapter',
        'question',
        'answer',
    ];
}
