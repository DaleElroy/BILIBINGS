<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    public $table ="carts";
    protected $fillable=['name','phone','gender','quantity','product_category',
    'product_title','product_photo','product_price','user_id','product_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
