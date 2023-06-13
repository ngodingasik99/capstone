<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data['semua'] = Pengeluaran::paginate(4)->withQueryString();
        return view('admin.pengeluaran.index', $data);
    }   
}
