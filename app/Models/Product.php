<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug','description','image','price','category_id'];

    // Inverse relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
