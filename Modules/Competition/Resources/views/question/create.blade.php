<x-modal title="Create Question">
    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="">Question</label>
            <input type="text" class="form-control" name="question" placeholder="Question" required>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</x-modal>
