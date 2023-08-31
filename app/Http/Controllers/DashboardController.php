<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function userIndex(Request $request, UserDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard');
    }
}
