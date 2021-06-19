<?php
namespace App\Http\Controllers;
use App\Models\Basket;
use App\Models\Catalog;
use App\Models\DeliveryMethods;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BasketController extends Controller
{

    public function getBasket()
    {
        if(!session()->has('Basket')){
            return view('basket');
        }
        $oldBasket = session()->get('Basket');
        $basket = new Basket($oldBasket);
  
        return view('basket', ['baskets'=> $basket->items, 'totalPrice' => $basket->totalPrice,]);
    }

    public function getAddToBasket(Request $request, $id){
        $product = Product::find($id);
        $oldBasket = session()->has('Basket') ? session()->get('Basket') : null;
        $basket = new Basket($oldBasket);
        $basket->add($product, $product->id);
        $request->session()->put('Basket', $basket);
       return redirect()->back();
    }
 
    public function getReduceByOne($id){
        $oldBasket = session()->has('Basket') ? session()->get('Basket') : null;
        $basket = new Basket($oldBasket);
        $basket->reduceByOne($id);
        if(count($basket->items) >0){
            session()->put('Basket', $basket);
        }else{
            session()->forget('Basket');
        }
        return redirect()->route('basket');
    }
    
    public function getIncreaseByOne($id){
        $oldBasket = session()->has('Basket') ? session()->get('Basket') : null;
        $basket = new Basket($oldBasket);
        $basket->increaseByOne($id);
        session()->put('Basket', $basket);
        return redirect()->route('basket');
    }

    public function getRemoveItem($id){
        $oldBasket = Session()->has('Basket') ? Session()->get('Basket') : null;
        $basket = new Basket($oldBasket);
        $basket->removeItem($id);
        if(count($basket->items) >0){
            session()->put('Basket', $basket);
        }else{
            session()->forget('Basket');
        }
        return redirect()->route('basket');
    }

    public function getOrder(){
        if(!session()->has('Basket')){
            return view('basket');
        }
        $oldBasket = session()->get('Basket');
        $basket = new Basket($oldBasket);
        $total = $basket->totalPrice;
        $deliveryMethods = DeliveryMethods::all();
        return view('order', [
            'baskets'=> $basket->items,
             'total' => $total,
             'deliveryMethods' => $deliveryMethods,
        ]);
    }

    public function postOrder(Request $request){
        if(!session()->has('Basket')){
            return redirect()->route('basket');
        }
        $oldBasket = session()->get('Basket');
        $basket = new Basket($oldBasket);

        if($request->deliveryMethod != 1){
            $request->validate([
                'city' => 'required|min:2|max:100',
                 'address' => 'required|min:5|max:100', 
                 'index' => 'required|min:6|max:6', 
                 'lastname' => 'required|min:2|max:50', 
                 'firstname' => 'required|min:2|max:50', 
                 'email' => 'required|min:5|max:255',
                  'telephone' => 'required|min:10|']);
        }else{
            $request->validate([
                'lastname' => 'required|min:2|max:50', 
                'firstname' => 'required|min:2|max:50', 
                'email' => 'required|min:5|max:255', 
                'telephone' => 'required|min:10|',]);
        }
        $user = User::create([
            'lastname' => $request->input('lastname'),
             'firstname' => $request->input('firstname'),
              'email' => $request->input('email'),
               'telephone' => $request->input('telephone'),
                'password' => '-',]);
    
        $order= Order::create([
            'user_id' => $user->id, 
            'delivery_method_id' => $request->input('deliveryMethod'),
             'order_status_id' => '1', 
             'city' => $request->input('city'),
              'address' => $request->input('address'), 
              'index' => $request->input('index'),
               'note' => $request->input('note'),
            ]);
     
        foreach($basket->items as $key=>$value){
            $b=new Basket();
            $b->order_id= $order->id;
            $b->product_id=$key;
            $b->amount=$value['amount'];
            $b->save();
        }
        session()->forget('Basket');
        return redirect()->route('products')->withSuccess('Спасибо за заказ! С вами свяжется менеджер для уточнения деталей заказа.');
    }
}