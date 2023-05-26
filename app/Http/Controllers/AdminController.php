<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyTransactionChart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.layout.index');
    }

    function dashboard( MonthlyTransactionChart $monthlyTransactionChart)
    {
        $data['monthlyTransactionChart'] = $monthlyTransactionChart->build();
        return view('admin.index', $data);
    }


}
