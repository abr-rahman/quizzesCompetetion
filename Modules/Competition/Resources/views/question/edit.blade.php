<x-modal title="Update Question">
    <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group mb-2">
            <label for="">Question</label>
            <input type="text" class="form-control" name="question" value="{{ $question->question}}" placeholder="Question" required>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</x-modal>
