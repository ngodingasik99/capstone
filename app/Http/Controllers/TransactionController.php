<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $transaction = Transaction::whereDate('created_at', $today)->get();
        $totaltransaction = Transaction::whereDate('created_at', $today)->sum('total');
        return view('admin.transaksi.index', compact('transaction', 'totaltransaction', 'today'));
    }
    public function detailtrasaction($id)
    {
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }

        $data['trsDetail'] = ProductTransaction::all()->where('transaction_id', $id);
        $data['trsCode'] = Transaction::where('id', $id)->first();
        $data['total'] = 0;
        foreach ($data['trsDetail'] as $trs) {   
            $data['total'] +=  $trs->price * $trs->qty;
        }

        return view('admin.transaksi.detailtransaction', $data);
    }
}
