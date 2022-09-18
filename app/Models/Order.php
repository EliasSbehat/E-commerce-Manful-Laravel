<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = ['customer_id','order_no', 'payment_type', 'total'];


    // Inverse one to many relationship to Customer model
    public function customers()
    {
        return $this->belongsTo(Customer::class ,'customer_id');
    }
    //One to many relationship to OrderDetail model
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
