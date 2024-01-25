<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id','category_id','name','price','quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

  
}

// $product = [
//     'category_id' => 1,
//     'name' => 'value1',
//     'price' => 'value2',
//     'quantity' => 'value3',
// ];
// Product::create($product);
