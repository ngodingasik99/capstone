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
        $total = Transaction::first();
        // dd($total);
        $modal = Managefinances::first();
        // $oke = $total->total - $modal->modal;
        $pendapatan = Managefinances::all(); 
        return view('admin.index', compact( 'total'));
    }
}
