<?php
namespace App\Models;
use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;
    public $updated_at = false;
    public $created_at = false;
    protected $fillable = ['user_id', 'delivery_method_id', 'order_status_id', 'city', 'address', 'index', 'note'];

    public function baskets(){
        return $this->hasMany(Basket::class);
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }


    public function deliveryMethod(){
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id');
    }

    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
