<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managefinance;
use App\Models\Managefinances;
use App\Models\Pengeluaran;
use App\Models\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PengeluaranController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::all();
        $data['totalPrice'] = 0;

        foreach ($data['carts'] as $cart) {   
            $data['totalPrice'] +=  $cart->product->price * $cart->qty;
        }

        $data['today'] = Carbon::now()->format('Y-m-d');
        // dd($data['today']);
        $data['pengeluarans'] = Pengeluaran::whereDate('created_at', $data['today'])->get();
        // dd($data['pengeluarans']);

        return view('kasir.pengeluaran', $data);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'biaya' => 'required|numeric|min:0',
            'foto_nota' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->file('foto_nota')) {
            $validasi['foto_nota'] = $request->file('foto_nota')->store('gambar');
        }

        $today = Carbon::now()->format('Y-m-d');
        $check = Managefinances::whereDate('created_at', $today)->exists();

        // dd($check);
        if ($check == true) {
            $keuangans = Managefinances::whereDate('created_at', $today)->get();
            foreach ($keuangans as $keuangan) {
                $keuanganId = $keuangan->id;
            }

            $store = ([
                'managefinance_id' => $keuanganId,
                'nama' => $validasi['nama'],
                'biaya' => $validasi['biaya'],
                'foto_nota' => $validasi['foto_nota']
            ]);
    
            Pengeluaran::create($store);
            Alert::success('Success', 'Pengeluaran berhasil ditambahkan');
        } else {
            Alert::error('Failed', 'Modal hari ini belum dimasukkan');
        }
        // dd($keuangans);
        
        return redirect('/kasir/pengeluaran');
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'biaya' => 'required|numeric|min:0',
            'foto_nota' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = Pengeluaran::find($id);
        $data->nama = $validasi['nama'];
        $data->biaya = $validasi['biaya'];
        if ($request->file('foto_nota')) {
            Storage::delete($data->foto_nota);
            $data->foto_nota = Storage::putFile('gambar', $request->file('foto_nota'));
        }
        $data->save();
        Alert::success('Success', 'Pengeluaran berhasil diedit');
        return redirect('/kasir/pengeluaran');
    }

    public function destroy($id)
    {
        $data = Pengeluaran::find($id);
        if ($data->foto_nota) {
            Storage::delete($data->foto_nota);
        }
        $data->destroy($id);
        return redirect('/kasir/pengeluaran');
    }
}