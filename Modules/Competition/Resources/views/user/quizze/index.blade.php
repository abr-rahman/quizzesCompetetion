@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Quizzes') }}
                <p class="" style="float: right"><b>Total Approved Point : </b> <strong class="text-bold text-success">{{ $total }}</strong></p> <p></p>
                <p class="" style="float: right"><b>Total Rejected Point : </b> <strong class="text-bold text-danger">{{ $reject }}</strong></p>
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>
    @push('js')

    <script>
        function create() {
            $.ajax({
                url: "{{ route('quizzes.create') }}",
                success: function(html) {
                    $('#modal').html(html).modal('show');
                }
            });
        }

        $('body').on('click', '.edit-btn', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                success: function(html) {
                    $('#modal').html(html).modal('show');
                }
            });
        });
        $('body').on('click', '.ans-btn', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                success: function(html) {
                    $('#modal').html(html).modal('show');
                }
            });
        });

        $(document).on('click', '#check_status', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.confirm ({
                'title': 'Confirmation',
                'message': 'Are you sure?',
                'buttons': {
                    'Yes': {
                        'class': 'yes btn-danger',
                        'action': function() {
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function (data){
                                    toastr.success(data);
                                    $('.dataTable').DataTable().ajax.reload();
                                }
                            });
                        }
                    }
                }
            });
        });



    </script>
    @endpush
@endsection
