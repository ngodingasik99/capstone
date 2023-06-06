<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managefinances;
use RealRashid\SweetAlert\Facades\Alert;

class ManagefinancesController extends Controller
{
    public function index()
    {
        $keuangan = Managefinances::all();
        return view('admin.kelolakeuangan.index', compact('keuangan'));
    }
    // public function card()
    // {
    //     $keuangan = Managefinances::all();
    //     return view('admin.index', compact('keuangan'));
    // }

    public function store(Request $request)
    {
        // dd($request);
        $validasi = $request->validate([
            'modal' => 'required'
        ]);

        Managefinances::create($validasi);
        Alert::success('Success', 'Manage finances has been added');
        return redirect('/kelolakeuangan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'modal' => 'required'
        ]);

        $data = Managefinances::find($id);
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
