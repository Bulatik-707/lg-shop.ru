<?php
namespace App\Models;
use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function baskets() {
        return $this->hasMany(Basket::class);}
    public function color(){
        return $this->belongsTo(Color::class);}
    public function catalog(){
        return $this->belongsTo(Catalog::class); //(Catalog::class,  'catalod_id'}
    }
    protected $fillable = ['name', 'catalog_id', 'color_id', 'image', 'price', 'description' ];

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);}
    protected $table = 'products';
}

