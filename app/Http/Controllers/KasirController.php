<?php

namespace App\Http\Controllers;

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

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }
        return view('kasir.listtransaction', $data);
    }
    public function detailtrasaction()
    {
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }
        return view('kasir.detailtrasaction', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addtocart(Request $request, $id)
    {
        $data['kasir'] = Product::all();
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }

        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);

        $carts = DB::table('carts')
                ->where('product_id', '=', $id)
                ->first();
        // $cart = Cart::find($id);
        // dd($carts);
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
        return redirect('/kasir/transaction');
    }

    public function checkout()
    {
        $generate_trs_code = 'KLPK12-'. Str::random(10);
        $totalPrice = 0;
        $carts = Cart::all();
        foreach ($carts as $cart) {   
            $totalPrice +=  $cart->product->price * $cart->qty;
        }
        $userID = Auth()->user()->id;

        $transaction = ([
            'user_id' => $userID,
            'transaction_code' => $generate_trs_code,
            'total' => $totalPrice
        ]);

        $transactionID = Transaction::create($transaction);
        // dd($transactionID->id);

        foreach ($carts as $item) {
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
        return redirect('/kasir/transaction');
    }
}
