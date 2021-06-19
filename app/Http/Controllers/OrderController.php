<?php
namespace App\Http\Controllers;
use App\Http\Filters\OrderFilter;
use App\Models\Basket;
use App\Models\DeliveryMethods;
use App\Models\Order;
use App\Models\OrderSmatus;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderFilter $filters){
        $orders = Order::filter($filters)->get();
        $deliveryMethods = DeliveryMethods::all();
        $orderStatuses = OrderSmatus::all();
        return view('admin.order.index',['orders' =>$orders, 'deliveryMethods'=> $deliveryMethods,'orderStatuses'=>$orderStatuses,]);
    }

    public function full($order_id){
        $order = Order::where('id', $order_id)->firstOrFail();
        $user = User::firstOrFail();
        $basket = Basket::where('order_id', $order_id)->get();
        return view('admin.order.full',['order' =>$order,'users'=>$user,'basket'=> $basket,]); }

    public function store(Request $request){
        $valid = $request->validate(['lastname' => 'required|min:5|max:8', ]);
        User::create($request);
        return redirect()->back()->withSuccess('успешно добавлен');
    }

    public function edit(Order $order){
        $deliveryMethods = DeliveryMethods::all();
        $orderStatuses = OrderSmatus::all();
        $baskets = Basket::where('order_id', $order->id)->get();
        return view('admin.order.edit', ['orderStatuses'=>$orderStatuses, 'deliveryMethods'=>$deliveryMethods,'order'=>$order,'baskets'=>$baskets,]);
    }

    public function update(Request $request, Order $order){
        $order->save();
        Order::create($request);
        return redirect()->back()->withSuccess('Статус заказа обнавлен!');
    }
}