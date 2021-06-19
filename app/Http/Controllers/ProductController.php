<?php
namespace App\Http\Controllers;
use App\Http\Filters\ProductFilter;
use App\Models\Catalog;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index',['products' => $products, ]);
    }

    public function create(){
        $catalogs = Catalog::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('admin.product.create',['catalogs'=>$catalogs, 'colors'=>$colors,]);
    }

    public function store(Request $request){
        if ($request->file('image') != null) {
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . '.' . $extension;
            Storage::putFileAs('/public/image/', $request->file('image'), $fileNameNew);
        } else {
            $fileNameNew = 'default.jpg';
        }
         Product::create(['name' => $request->input('name'), 'color_id' => $request->input('color_id'), 'catalog_id' => $request->input('catalog_id'), 'description' => $request->input('description'), 'price' => $request->input('price'), 'image' => $fileNameNew]);
        return redirect()->back()->withSuccess('Изделие успешно добавлено');
    }

    public function edit(Product $product){
        $catalogs = Catalog::orderBy('name')->get();
        $colors = Color::all();
        return view('admin.product.edit', ['catalogs'=>$catalogs, 'colors'=>$colors, 'product'=>$product, ]);
    }

    public function update(Request $request, Product $product){
        $fileNameNew = $product->image;
        if($request->file('image') !=null){
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . $extension;
            Storage::delete('public/image/' . $product->image);
            $request->file('image')->storeAs('public/image', $fileNameNew); }
        $product->update(['name' => $request-> input('name'), 'color_id' => $request->input('color_id'), 'catalog_id' => $request->input('catalog_id'), 'description' => $request->input('description'), 'price' => $request->input('price'), 'image' => $fileNameNew]);
        return redirect()->back()->withSuccess('Изделие обнавлено!');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->back()->withSuccess('Изделие удалено!');
    }

    public function products(ProductFilter $filters) {
        $products = Product::filter($filters)->paginate(8)->withQueryString();
        $catalogs = Catalog::orderBy('name', 'asc')->get();
        return view('products', ['products' => $products, 'catalogs' => $catalogs ]);
    }
    public function product($product_id){
        $product = Product::where('id', $product_id)->firstOrFail();
        return view('product', ['product'=>$product, ]);
    }

    public function productsForCatalog(Catalog $catalog){
       $catalogs = Catalog::all();
       $products = Product::with('products')->where('catalog_id', $catalog);
       return view('products', ['products'=>$products, 'catalogs' => $catalogs]);
    }

    public function show2(){
        $products = Product::all();
        return view('products', ['products'=>$products ]);
    }
}