<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyTransactionChart;
use Illuminate\Http\Request;
use App\Models\Managefinances;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.layout.index');
    }

    public function dashboard( MonthlyTransactionChart $monthlyTransactionChart)
    {
        $data['pendapatan'] = Managefinances::all();
        $data['monthlyTransactionChart'] = $monthlyTransactionChart->build();
        // dd($pendapatan, $data);
        return view('admin.index', $data);
    }

    // public function card()
    // {
    //     $pendapatan = Managefinances::all();
    //     // dd($pendapatan);
    //     return view('admin.index', compact('pendapatan'));
    // }


}
