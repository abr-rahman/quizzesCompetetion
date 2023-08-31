@extends('layouts.admin-master')

@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                @can('isAdmin')
                    <b>Admin</b>
                @elsecan('isUser')
                    <b>User</b>
                @endcan
                {{ __('Dashboard') }}
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>
@endsection

