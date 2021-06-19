<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'image'];
    public function products(){
        return $this->hasMany(Product::class);
    }    
}
