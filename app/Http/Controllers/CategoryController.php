<?php

namespace App\Http\Controllers;
 
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['category'] = category::where('category_name', 'LIKE', '%' . $request->search.'%')->paginate(4)->withQueryString();
        }else{
            $data['category'] = category::paginate(4)->withQueryString();
        }
        return view('admin.kategori.index', $data);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'category_name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->file('photo')) {
            $validasi['photo'] = $request->file('photo')->store('gambar');
        }

        category::create($validasi);
        Alert::success('Success', 'Category has been added');
        return redirect('/kategori');
    }

    public function action(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|max:50',
            'photo' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
        ]);

        $data = category::find($id);
        $data->category_name = $request->category_name;
        if ($request->file('photo')) {
            Storage::delete($data->photo);
            $data->photo = Storage::putFile('gambar', $request->file('photo'));
        }
        Alert::success('Success', 'Category has been edited');
        $data->save();
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $data = category::find($id);
        if ($data->photo) {
            Storage::delete($data->photo);
        }
        category::destroy($id);
        return redirect('/kategori');
    }
}
