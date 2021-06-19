<?php
namespace App\Http\Controllers;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CatalogController extends Controller
{
    public function index(){
        $catalogs = Catalog::orderBy('name', 'asc')->get();
        return view('admin.catalog.index',['catalogs' =>$catalogs]);
    }

    public function create(){
        return view('admin.catalog.create');
    }

    public function store(Request $request){
        if ($request->file('image') != null) {
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . '.' . $extension;
            Storage::putFileAs('/public/image/', $request->file('image'), $fileNameNew);
        } else {
            $fileNameNew = 'default.png';
        }
        Catalog::create(['name' => $request->input('name'), 'image' => $fileNameNew]);
        return redirect()->back()->withSuccess('Каталог добавлен');
    }

    public function edit(Catalog $catalog){
        return view('admin.catalog.edit', ['catalog'=>$catalog]);
    }

    public function update(Request $request, Catalog $catalog){
        
        $fileNameNew = $catalog->image; 
        if ($request->file('image') != null) {
        $fullFileName = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $fileNameNew = $fileName . '_' . time() . $extension;

        Storage::delete('public/image/' . $catalog->image);
        $request->file('image')->storeAs('public/image', $fileNameNew);
        }
        $catalog->update(['name' => $request->input('name'), 'image' => $fileNameNew]);
        return redirect()->back()->withSuccess('Каталог обнавлен!'); 
    }

    public function destroy(Catalog $catalog){
        $catalog->delete();
        return redirect()->back()->withSuccess('Каталог удален!');
    }

    public function catalogs(){
        return view('catalogs', ['catalogs_all'=>Catalog::all()]);
    }

    public function show2(Catalog $catalog){
        $products = $catalog->products()->paginate(8)->withQueryString();
        $catalogs = Catalog::orderBy('name', 'asc')->get();
        return view('products', ['products'=>$products, 'catalogs' => $catalogs]);
    }
}