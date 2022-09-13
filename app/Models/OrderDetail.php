<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','product_name','quantity','total'];
    
    //Inverse one to many relationship to Order model
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
