<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Managefinances;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;

class ManagefinancesController extends Controller
{
    public function index()
    {
        $total = Transaction::first();
        // dd($p);
        $date = Carbon::now(); // Tanggal saat ini
        // dd($date->format('Y-m-d'));
        $modalawal = Managefinances::all();
        $modal = Managefinances::first();
        // dd($modal);
        $oke = $total->total - $modal->modal;
        // dd($modal, $oke);
        // dd($oke);
            // if ($p && $a) {
            //     $total = $p->total;
            //     $modal = $a->modal;
            //     $d = $total -= $modal;
            //     dd($d);
            // }
        // dd($l);
        return view('admin.kelolakeuangan.index', compact('modalawal', 'total', 'oke', 'date'));
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
