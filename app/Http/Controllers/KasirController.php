<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Managefinances;
use App\Models\Pengeluaran;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KasirController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }
        return view('kasir.index', $data);
    }
    public function transaction()
    {
        $data['kasir'] = Product::all();
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }
        return view('kasir.transaction', $data);
    }
    public function listtransaction()
    {
        $carts = Cart::all();
        $totalPrice = 0;

        $today = Carbon::now()->format('Y-m-d');
        $transactions = Transaction::whereDate('created_at', $today)->get();
        $totaltransaction = Transaction::whereDate('created_at', $today)->sum('total');
        $totalpengeluaran = Pengeluaran::whereDate('created_at', $today)->sum('biaya');

        foreach ($carts as $cart) {
            $totalPrice +=  $cart->product->price * $cart->qty;
        }
        return view('kasir.listtransaction', compact('transactions', 'totaltransaction', 'totalpengeluaran', 'carts', 'totalPrice'));
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

        return view('kasir.detailtrasaction', $data);
    }

    public function addtocart(Request $request, $id)
    {
        $data['kasir'] = Product::all();
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;
        $stockReady = true;

        // dd($request->qty);
        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }

        $products = Product::find($id);
        if ($products->stock < $request->qty ) {
            $stockReady = false;
        }

        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);

        if ($stockReady == true) {
            $carts = DB::table('carts')
                    ->where('product_id', '=', $id)
                    ->first();

            if ( is_null($carts)) {
                Cart::create([
                    'product_id' => $id,
                    'qty' => $request->qty
                ]);
            } else {
                Cart::where('product_id', $id)->update([
                    'qty' => $request->qty
                ]);
            }
            Alert::success('Success', 'Product has been added to cart');
        } else {
            Alert::error('failed', 'Not enough stock');
        }

        return redirect('/kasir/transaction');
    }

    public function checkout()
    {
        $generate_trs_code = 'KLPK12-'. Str::random(10);
        $totalPrice = 0;
        $stockReady = true;
        $carts = Cart::all();
        foreach ($carts as $cart) {   
            $totalPrice +=  $cart->product->price * $cart->qty;
            if ($cart->product->stock < $cart->qty ) {
                $stockReady = false;
            }
        }
        
        if ($stockReady == true) {
            $userID = Auth()->user()->id;

            $transaction = ([
                'user_id' => $userID,
                'transaction_code' => $generate_trs_code,
                'total' => $totalPrice
            ]);

            $transactionID = Transaction::create($transaction);
            // dd($transactionID->id);
            foreach ($carts as $item) {
                
                $product = product::find($item->product_id);
                $product->stock = $item->product->stock - $item->qty;
                $product->save();
                $store = ([
                    'transaction_id' => $transactionID->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->product_name,
                    'price' => $item->product->price,
                    'subtotal' => $item->product->price * $item->qty,
                    'qty' => $item->qty
                ]);
                ProductTransaction::create($store);
            }
    
            DB::table('carts')->truncate();
    
            Alert::success('Success', 'Checkout success');
        } else {
            Alert::error('failed', 'Not enough stock');
        }

        return redirect('/kasir/transaction');
    }

    public function deletecart($id) 
    {
        $cartItem = Cart::where('id', $id);
        $cartItem->delete();
        Alert::success('Success', 'Delete success');
        return redirect('/kasir/transaction');
    }

    public function closing(Request $request)
    {
        $validasi = $request->validate([
            'total_transaction' => 'required|numeric',
            'pengeluaran' => 'required|numeric|min:0'
        ]);
        // dd($validasi);   

        $today = Carbon::now()->format('Y-m-d');
        $check = Managefinances::whereDate('created_at', $today)->exists();

        // dd($check);
        
        if ($check == true) {
            $keuangans = Managefinances::whereDate('created_at', $today)->get();

            foreach ($keuangans as $keuangan) {
                $keuanganId = $keuangan->id;
            }

            $data = Managefinances::find($keuanganId);
            $data->pengeluaran = $validasi['pengeluaran'];
            $data->total_transaction = $validasi['total_transaction'];
            $data->save();
            
            Alert::success('Success', 'Data closing has been saved');
        } else {
            Alert::error('Failed', 'Modal hari ini belum dimasukkan');
        }

        return redirect('/kasir/listtansaction');
    }
}
