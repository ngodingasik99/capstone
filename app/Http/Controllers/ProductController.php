<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['category'] = category::where('category_name', 'LIKE', '%' . $request->search.'%')->paginate(4)->withQueryString();
            $data['product'] = product::where('product_name', 'LIKE', '%' . $request->search . '%')->paginate(4)->withQueryString();
        }else{
            $data['category'] = Category::all();
            $data['product'] = product::paginate(4)->withQueryString();
        }
        return view('admin.produk.index', $data);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'product_name' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|numeric|min:1'
        ]);

        if ($request->file('photo')) {
            $validasi['photo'] = $request->file('photo')->store('gambar');
        }

        product::create($validasi);
        Alert::success('Success', 'Product has been added');
        return redirect('/produk');
    }

    public function action(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required',
            'photo' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
            'stock' => 'required|numeric|min:1',
        ]);

        $data = product::find($id);
        $data->product_name = $request->product_name;
        $data->price = $request->price;
        $data->category_id = $request->category_id;
        $data->stock = $request->stock;
        if ($request->file('photo')) {
            Storage::delete($data->photo);
            $data->photo = Storage::putFile('gambar', $request->file('photo'));
        }
        $data->save();
        Alert::success('Success', 'Product has been edited');
        return redirect('/produk');
    }

    public function destroy($id)
    {
        $data = product::find($id);
        if ($data->photo) {
            Storage::delete($data->photo);
        }
        $data->delete();
        return redirect('/produk');
    }
}
