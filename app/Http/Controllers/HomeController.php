<?php
namespace App\Http\Controllers;
use App\Models\Catalog;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    public function home(){
      $catalogs = Catalog::orderBy('name', 'asc')->get();
        return view('home', ['catalogs'=>$catalogs,]);
    }

    public function ap_index(){ return view('ap_index');}

    public function index(){
        $Catalogs_count = Catalog::all()->count();
        $Colors_count = Color::all()->count();
        $Products_count = Product::all()->count(); 
        $Orders_count = Order::all()->count(); 
        return view('admin.home.index', ['Colors_count'=>$Colors_count, 'Catalogs_count'=>$Catalogs_count, 'Products_count'=>$Products_count, 'Orders_count'=>$Orders_count,]);
    }
    public function delivery(){ return view('delivery');}
    public function price(){ return view('price');}
    public function about(){ return view('about');}
    public function contacts(){ return view('contacts');}
    public function privacy(){ return view('privacy'); }
}