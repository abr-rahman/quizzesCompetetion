<?php

namespace Modules\Competition\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Competition\DataTables\QuestionDataTable;
use Modules\Competition\Http\Requests\StoreQuestionRequest;
use Modules\Competition\Http\Requests\UpdateQuestionRequest;
use Modules\Competition\Interfaces\QuestionServiceInterface;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionServiceInterface $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index(Request $request, QuestionDataTable $dataTable)
    {
        return $dataTable->render('competition::question.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competition::question.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = $this->questionService->store($request->validated());
        return back()->with('success', 'Question created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = $this->questionService->find($id);
        return view('competition::question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $question = $this->questionService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question = $this->questionService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function activeStatus($id)
    {
        $question = $this->questionService->statusInactive($id);
        return response()->json(['Status change successfully!']);
    }

    public function inActiveStatus($id)
    {
        $question = $this->questionService->statusActive($id);
        return response()->json(['Status change successfully!']);
    }
}
