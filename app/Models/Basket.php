<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public $items = null; 
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldBasket1 = null){
        if($oldBasket1!=null){
            $this->items = $oldBasket1->items;
            $this->totalQty = $oldBasket1->totalQty;
            $this->totalPrice = $oldBasket1->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['amount' => 0,'price' => $item->price,'item' =>$item 
        ];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['amount']++;
        $storedItem['price'] = $item->price * $storedItem['amount'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id){
        $this->items[$id]['amount']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if( $this->items[$id]['amount'] <= 0){
            unset($this->items[$id]);
        }
    }


    public function increaseByOne($id){
        $this->items[$id]['amount']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
        if( $this->items[$id]['amount'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['amount'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}