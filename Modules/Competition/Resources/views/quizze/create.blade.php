<x-modal title="Create Question">
    <form action="{{ route('quizzes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="">Quizze Name</label>
            <input type="text" class="form-control" name="name" placeholder="Quizze Name" required>
        </div>
        <div class="form-group mb-2">
            <label for="">Assign to</label>
            <select name="user_id" id="" class="form-control">
                <option value="">Select User</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">Select Questions</label>
            <select name="question_id" id="" class="form-control">
                <option value="">Select Question</option>
                @foreach ($questions as $question)
                <option value="{{ $question->id }}">{{ $question->question }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">To Date</label>
            <input type="date" class="form-control" name="to_date" placeholder="To Date">
        </div>
        <div class="form-group mb-2">
            <label for="">End Date</label>
            <input type="date" class="form-control" name="end_date" placeholder="Point">
        </div>
        <div class="form-group mb-2">
            <label for="">Point</label>
            <input type="number" class="form-control" name="point" placeholder="Point" required>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</x-modal>
