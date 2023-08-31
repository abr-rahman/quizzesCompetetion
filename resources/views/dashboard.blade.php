@extends('layouts.admin-master')

@section('section')
    <div class="py-2">
        <div class="card">
            <div class="card-header">
                <h5>Dashboard
                    <span class="float-right">
                        Welcome!
                    </span>
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>2</h3>
                                <p>Total Clients</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i> <!-- Clients icon -->
                            </div>
                            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-top"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>3</h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i> <!-- Users icon -->
                            </div>
                            <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-top"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>0</h3>
                                <p>Total Products</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-box-open"></i> <!-- Products icon -->
                            </div>
                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-top"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>0</h3>
                                <p>Total Services</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cogs"></i> <!-- Services icon -->
                            </div>
                            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-top"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
