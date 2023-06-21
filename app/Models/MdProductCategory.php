<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdProductCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'md_product_category_id';
    protected $guarded = ['md_product_category_id'];

    public function getProductCategoryImageAttribute()
{
    return asset('img/product_category_image/'.$this->attributes['product_category_image']);
}
}
