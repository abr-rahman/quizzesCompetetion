<x-modal title="Create Answer">
    <form action="{{ route('quizzes.answer_update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $id}}">
        <div class="form-group mb-2">
            <label for="">Answer</label>
            <textarea name="answer" class="form-control" cols="30" rows="10" placeholder="Please write your answer"></textarea>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</x-modal>
