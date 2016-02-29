<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    protected $fillable = [
        'name', 'description', 'price','type_id','photo'
    ];
    
    public function type(){
        return $this->belongsTo("App\Models\Type");
    }
    
    public function orders(){
        return $this->belongsToMany('App\Models\Order');   
    }
}
