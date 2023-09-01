@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Answer Sheet') }}
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>
    @push('js')

    <script>
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
