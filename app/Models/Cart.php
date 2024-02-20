<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table ="carts";
    protected $fillable=['name','phone','gender','quantity','product_category',
    'product_title','product_photo','product_price'];
}
