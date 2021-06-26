<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'slug',
        'item_count',
    ];
    public function fooditem(){
        return $this->hasMany(App\Models\Catagory::class);
    }
}
