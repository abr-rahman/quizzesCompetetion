<?php

namespace Modules\Competition\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\DataTables\AnswerDataTable;
use Modules\Competition\Entities\Answer;
use Modules\Competition\Entities\Quizzes;

class AnswerController extends Controller
{
    public function quizeAnswer($id)
    {
        return view('competition::user.answer.create', compact('id'));
    }

    public function answerSheet(AnswerDataTable $dataTable)
    {
        return $dataTable->render('competition::user.answer.index');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('competition::index');
    }


    public function ansUpdate(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required',
        ]);
        $quizze =  Quizzes::where('id', $id)->first();
        $quizze->answer = $request->answer;
        $quizze->save();

        return back()->with('success', 'Answer created successfully!');
    }

    public function destroy($id)
    {
        //
    }


}
