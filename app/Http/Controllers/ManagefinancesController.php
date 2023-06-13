<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Managefinances;
use App\Models\Pengeluaran;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;

class ManagefinancesController extends Controller
{
    public function index()
    {
        $data['today'] = Carbon::now()->format('Y-m-d');
        $data['transactions'] = Managefinances::whereDate('created_at', $data['today'])->get();
        $data['pengeluaran'] = Pengeluaran::whereDate('created_at', $data['today'])->sum('biaya');
        $data['pengeluarantbl'] = Pengeluaran::whereDate('created_at', $data['today'])->get();
        // dd($data['pengeluarantbl']);
        // dd($transactions,$transactionsall);
        $data['totaltransaction'] = Managefinances::whereDate('created_at', $data['today'])->sum('total_transaction');
        $data['kolom'] = Managefinances::whereDate('created_at', $data['today'])->sum('modal');
        // dd($data['totaltransaction']);
        // dd($data['kolom']);
        $data['hasil'] = $data['totaltransaction'] - $data['kolom'];
        // dd($p);
        // foreach ($data['transactionsall'] as $key ) {
        //     $data['datajumlah'] = $key->$data['totaltransaction'] - $key->$data['kolom'];
        //     dd($data['datajumlah']);
        // }
        return view('admin.kelolakeuangan.index', $data);
    } 

    

    public function store(Request $request)
    {
        // dd($request);
        $validasi = $request->validate([
            // 'tanggal' => 'required',
            'modal' => 'required'
        ]);

        Managefinances::create($validasi);
        Alert::success('Success', 'Manage finances has been added');
        return redirect('/kelolakeuangan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'tanggal' => 'required',
            'modal' => 'required'
        ]);

        $data = Managefinances::find($id);
        // $data->tanggal = $request->tanggal;
        $data->modal = $request->modal;
        $data->save();
        Alert::success('Success', 'Manage finances has been edited');
        return redirect('/kelolakeuangan');
    }

    public function destroy($id)
    {
        $data = Managefinances::destroy($id);
        return redirect('/kelolakeuangan');
    }
}
