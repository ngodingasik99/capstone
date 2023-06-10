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
        // panggil data dari tabel managefinance
        // $data = Managefinances::get();
        $data['hasil'] = Transaction::sum('total');
        $data['date'] = Carbon::now();
        $data['modalawal'] = Managefinances::all();
        foreach ($data['modalawal'] as $key ) {
            $data['datajumlah'] = $data['hasil'] - $key->modal;
            // dd($data['datajumlah']);
        }
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
