<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'body',
        'image',
        'author',
        'cat_id',
        'price',
    ];
    
    public function catagory(){
        return $this->belongsTo(Catagory::class,'cat_id');
    }
}
