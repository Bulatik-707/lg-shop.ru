<?php
namespace App\Http\Filters;

class ProductFilter extends QueryFilter{

    public function filterCatalog_id($id){
        return $this->builder->where('catalog_id', $id)->paginate(8)->withQueryString();
    }
    public function search($search = ''){
        return $this->builder->where('name', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->orWhere('price', 'like', "%$search%");
    }
    public function filter_Price_Order($order = 'asc'){
        return $this->builder->orderBy('price', $order);
    }
    public function adminPrice($order = 'asc'){
        return $this->builder->orderBy('price', $order);
    }  
}