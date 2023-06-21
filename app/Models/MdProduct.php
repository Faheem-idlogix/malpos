<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdProduct extends Model
{
    use HasFactory;

    
  
    protected $primaryKey = 'md_product_id';
    protected $guarded = ['md_product_id'];

    public function getProductImageAttribute()
{
    return asset('img/product_image/'.$this->attributes['product_image']);
}
}
