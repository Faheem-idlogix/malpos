<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdProductModifier extends Model
{
    use HasFactory;
    protected $primaryKey = 'md_product_modifier_id';
    protected $guarded = ['md_product_modifier_id'];
}
