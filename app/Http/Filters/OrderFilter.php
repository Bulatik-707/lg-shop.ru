<?php
namespace App\Http\Filters;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderFilter extends QueryFilter{

    public function adminFilter_OS($OSIds){
        return $this->builder->whereIn('order_status_id', $this->paramToArray($OSIds));
    }
    public function adminFilter_DM($DMIds){
        return $this->builder->whereIn('delivery_method_id', $this->paramToArray($DMIds));
    }
    public function filter_OS_New(){
        return $this->builder
            ->orwhere('orderStatus_id', 1)
            ->orWhere('orderStatus_id', 3);
        
      //  return $this->builder->whereIn('order_status_id', [1, 3]);
    }
    public function filter_OS_Arhiv(){
       return $this->builder
       ->orwhere('orderStatus_id', 2)
       ->orWhere('orderStatus_id', 4);
    }
}