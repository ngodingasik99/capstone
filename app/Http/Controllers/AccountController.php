<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['users'] = User::where('name', 'LIKE', '%' . $request->search.'%')->paginate(4)->withQueryString();
        }else{
            $data['users'] = User::paginate(4)->withQueryString();
        }
        return view('admin.akun.index', $data);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        // if ($request->email != $data->email) {
            $data->email = $request->email;
        //     dd($data->email);
        // }
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        if ($request->file('photo')) {
            Storage::delete($data->photo);
            $data->photo = Storage::putFile('gambar', $request->file('photo'));
        }
        Alert::success('Success', 'Account has been edited');
        $data->save();
        return redirect('/akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        if ($data->photo) {
            Storage::delete($data->photo);
        }
        User::destroy($id);
        return redirect('/akun');
    }
}
