<x-modal title="Update Quizze">
    <form action="{{ route('quizzes.update', $quizze->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group mb-2">
            <label for="">Quizze Name</label>
            <input type="text" class="form-control" name="name" value="{{ $quizze->name }}" placeholder="Quizze Name" required>
        </div>
        <div class="form-group mb-2">
            <label for="">Assign to</label>
            <select name="user_id" id="" class="form-control">
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option @selected($user->id == $quizze->user_id) value="{{ $user->id }}"
                        @class([ 'bg-purple-600 text-white' => $user->id == $quizze->user_id ])>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">Select Questions</label>
            <select name="question_id" id="" class="form-control">
                <option value="">Select Question</option>
                @foreach ($questions as $question)
                <option value="{{ $question->id }}" @selected($question->id == $quizze->question_id)>{{ $question->question }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">To Date</label>
            <input type="date" value="{{ $quizze->to_date->format('Y-m-d') }}" class="form-control" name="to_date" placeholder="To Date">
        </div>
        <div class="form-group mb-2">
            <label for="">End Date</label>
            <input type="date" value="{{ $quizze->end_date->format('Y-m-d') }}" class="form-control" name="end_date" placeholder="End Date">
        </div>
        <div class="form-group mb-2">
            <label for="">Point</label>
            <input type="number" class="form-control" name="point" value="{{ $quizze->point }}" placeholder="Point" required>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</x-modal>
