<?php

namespace Modules\Competition\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-M-y',
        'updated_at' => 'datetime:d-M-y',
    ];
    protected $fillable = ['question','status'];

    protected static function newFactory()
    {
        return \Modules\Competition\Database\factories\QuestionFactory::new();
    }
}
