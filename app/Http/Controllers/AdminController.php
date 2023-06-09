<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyTransactionChart;
use Illuminate\Http\Request;
use App\Models\Managefinances;
use App\Models\Transaction;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.layout.index');
    }

    public function dashboard( MonthlyTransactionChart $monthlyTransactionChart)
    {
        // $total = Transaction::all();
        $total = Transaction::first();
        $modal = Managefinances::first();
        // dd($modal);
        $oke = $total->total - $modal->modal;
        // dd($modal, $oke);
        // return view('admin.kelolakeuangan.index', compact('modalawal', 'total', 'oke', 'date'));


        $pendapatan = Managefinances::all();
        // $pendapatan['monthlyTransactionChart'] = $monthlyTransactionChart->build();
        // dd($pendapatan, $pendapatan);
        return view('admin.index', compact('pendapatan', 'oke', 'total'));
    }

    // public function card()
    // {
    //     $pendapatan = Managefinances::all();
    //     // dd($pendapatan);
    //     return view('admin.index', compact('pendapatan'));
    // }


}
