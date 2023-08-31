<?php

namespace Modules\Competition\Services;

use App\Models\User;
use Modules\Competition\Entities\Quizzes;
use Modules\Competition\Interfaces\QuestionServiceInterface;
use Modules\Competition\Interfaces\QuizzesServiceInterface;

use function is_integer;

Class QuizzesService implements QuizzesServiceInterface
{
    public function all()
    {
        $quizzes = Quizzes::orderBy('id', 'desc')->get();
        return $quizzes;
    }

    public function store(array $attributes)
    {
        $user = User::where('role', 'user')->get();
        // dd($user);
        $quizzes =  Quizzes::create($attributes);
        return $quizzes;
    }

    public function find(int $id)
    {
        $quizzes = Quizzes::find($id);
        return $quizzes;
    }

    public function update(array $attributes, int $id)
    {
        $quizzes = Quizzes::find($id);
        $updatedTask = $quizzes->update($attributes);
        return $updatedTask;
    }

    public function delete(int $id)
    {
        $item = Quizzes::find($id);
        $item->delete($item);
        return $item;
    }

    public function statusActive(int $id)
    {
        $quizzes = Quizzes::find($id);
        if ($quizzes->status == 2) {
            $quizzes->status = 1;
        }
        $quizzes->save();
        return $quizzes;
    }

    public function statusInactive(int $id)
    {
        $quizzes = Quizzes::find($id);
        if ($quizzes->status == 1) {
            $quizzes->status = 2;
        }
        $quizzes->save();
        return $quizzes;
    }
}
