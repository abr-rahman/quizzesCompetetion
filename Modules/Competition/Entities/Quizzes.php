<?php

namespace Modules\Competition\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizzes extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
        'to_date' => 'datetime:d-m-Y',
        'end_date' => 'datetime:d-m-Y',
    ];
    protected $fillable = [
        'name',
        'to_date',
        'user_id',
        'question_id',
        'end_date',
        'point',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    protected static function newFactory()
    {
        return \Modules\Competition\Database\factories\QuizzesFactory::new();
    }
}
