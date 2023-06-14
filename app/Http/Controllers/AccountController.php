<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['users'] = User::where('name', 'LIKE', '%' . $request->search.'%')->paginate(4)->withQueryString();
        }else{
            $data['users'] = User::paginate(4)->withQueryString();
        }
        return view('admin.akun.index', $data);
    }

    public function store(Request $request)
    {        
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // dd($validasi);
        $validasi['password'] = Hash::make($request->password);
        if ($request->file('photo')) {
            $validasi['photo'] = $request->file('photo')->store('gambar');
        }

        User::create($validasi);
        Alert::success('Success', 'Account has been created');
        return redirect('/akun');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $check = User::where('email', $request->email)->exists();
        $data = User::find($id);
        if ($request->file('photo')) {
            Storage::delete($data->photo);
            $data->photo = Storage::putFile('gambar', $request->file('photo'));
        }

        $data->name = $request->name;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        if ($check == false) {
            $data->email = $request->email;
        }
        
        $data->save();
        Alert::success('Success', 'Account has been edited');
         
        return redirect('/akun');
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data->photo) {
            Storage::delete($data->photo);
        }
        $data->delete();
        return redirect('/akun');
    }
}
