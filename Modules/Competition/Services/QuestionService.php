<?php

namespace Modules\Competition\Services;

use Modules\Competition\Entities\Question;
use Modules\Competition\Interfaces\QuestionServiceInterface;

use function is_integer;

Class QuestionService implements QuestionServiceInterface
{
    public function all()
    {
        $question = Question::orderBy('id', 'desc')->get();
        return $question;
    }

    public function store(array $attributes)
    {
        $question =  Question::create($attributes);
        return $question;
    }

    public function find(int $id)
    {
        $question = Question::find($id);
        return $question;
    }

    public function update(array $attributes, int $id)
    {
        $question = Question::find($id);
        $updatedTask = $question->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Question::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $question = Question::find($id);
        if ($question->status == 2) {
            $question->status = 1;
        }
        $question->save();
        return $question;
    }

    public function statusInactive(int $id)
    {
        $question = Question::find($id);
        if ($question->status == 1) {
            $question->status = 2;
        }
        $question->save();
        return $question;
    }
}
