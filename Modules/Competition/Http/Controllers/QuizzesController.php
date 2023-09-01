<?php

namespace Modules\Competition\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Competition\DataTables\QuizzesDataTable;
use Modules\Competition\Entities\Question;
use Modules\Competition\Http\Requests\QuizzesStoreRequest;
use Modules\Competition\Http\Requests\QuizzesUpdateRequest;
use Modules\Competition\Interfaces\QuizzesServiceInterface;

class QuizzesController extends Controller
{
    protected $quizzeService;

    public function __construct(QuizzesServiceInterface $quizzeService)
    {
        $this->quizzeService = $quizzeService;
    }

    public function index(Request $request, QuizzesDataTable $dataTable)
    {
        return $dataTable->render('competition::quizze.index');
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $questions = Question::where('status', 1)->get();
        return view('competition::quizze.create', compact('users', 'questions'));
    }

    public function store(QuizzesStoreRequest $request)
    {
        $quizze = $this->quizzeService->store($request->validated());
        return back()->with('success', 'Quizzes created successfully!');
    }

    public function show($id)
    {
        return view('competition::show');
    }

    public function edit($id)
    {
        $users = User::where('role', 'user')->get();
        $questions = Question::where('status', 1)->get();
        $quizze = $this->quizzeService->find($id);
        return view('competition::quizze.edit', compact('quizze', 'users', 'questions'));
    }

    public function update(QuizzesUpdateRequest $request, $id)
    {
        $quizze = $this->quizzeService->update($request->validated(), $id);
        return back()->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $quizze = $this->quizzeService->delete($id);
        return response()->json('Deleted successfully!');
    }

    public function activeStatus($id)
    {
        $quizze = $this->quizzeService->statusInactive($id);
        return response()->json(['Status change successfully!']);
    }

    public function inActiveStatus($id)
    {
        $quizze = $this->quizzeService->statusActive($id);
        return response()->json(['Status change successfully!']);
    }
    public function approve($id)
    {
        $quizze = $this->quizzeService->answerApprove($id);
        return back()->with('success', 'Answer Approved!');
    }
    public function reject($id)
    {
        $quizze = $this->quizzeService->answerReject($id);
        return back()->with('success', 'Answer Rejected!');
    }
}
