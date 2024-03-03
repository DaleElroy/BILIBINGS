<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $table ="user_details";
    use HasFactory;
    protected $fillable = ['address','phone','gender','age'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
