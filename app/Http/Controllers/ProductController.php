<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::all();
        $data['product'] = product::all();
        return view('admin.produk.index', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validasi = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10',
            'stock' => 'required'
        ]);

        if ($request->file('photo')) {
            $validasi['photo'] = $request->file('photo')->store('gambar');
        }

        product::create($validasi);
        return redirect('/produk');
        // ->with('success', 'Product created successfully.');
    }

    public function action(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'photo' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
            'stock' => 'required',
        ]);

        $data = product::find($id);
        $data->product_name = $request->product_name;
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->stock = $request->stock;
        if ($request->file('photo')) {
            Storage::delete($data->photo);
            $data->photo = Storage::putFile('gambar', $request->file('photo'));
        }
        $data->save();
        return redirect('/produk');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = product::find($id);
        if ($data->photo) {
            Storage::delete($data->photo);
        }
        product::destroy($id);
        return redirect('/produk');
    }
}