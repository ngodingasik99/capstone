<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyTransactionChart;
use Illuminate\Http\Request;
use App\Models\Managefinances;
use App\Models\Transaction;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['today'] = Carbon::now()->format('Y-m-d');
        $data['totaltransaksi'] = Transaction::whereDate('created_at', $data['today']);
        $data['totaltransaction'] = Managefinances::whereDate('created_at', $data['today'])->sum('total_transaction');
        $data['kolom'] = Managefinances::whereDate('created_at', $data['today'])->sum('modal');
        $data['hasil'] = $data['totaltransaction'] - $data['kolom'];
        
        $pendapatan = Managefinances::all(); 
        return view('admin.index', $data);
    }
}
