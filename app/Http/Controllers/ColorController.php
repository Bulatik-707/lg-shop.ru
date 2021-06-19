<?php
namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;
class ColorController extends Controller
{
    public function index(){
        $colors = Color::orderBy('name', 'desc')->get();
        return view('admin.color.index',['colors' =>$colors]);
    }

    public function create(){
        return view('admin.color.create');
    }

    public function store(Request $request){
        $this->validate($request, ['name' => 'required|unique:colors|min:5|max:30',]);
        $new_color = new Color();
        $new_color->name = $request->name;
        $new_color->save();
        return redirect()->back()->withSuccess('Цвет успешно добавлен');
    }

    public function edit(Color $color){
        return view('admin.color.edit', ['color'=>$color]);
    }

    public function update(Request $request, Color $color){
        $color->name = $request->name;
        $color->save();
        return redirect()->back()->withSuccess('Цвет обнавлен!');
    }

    public function destroy(Color $color){
        $color->delete();
        return redirect()->back()->withSuccess('Цвет удален!');
    }

    public function show2(){
        $colors = Color::all();
        return view('colors', ['colors'=>$colors]);
    }
}