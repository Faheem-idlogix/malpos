<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdIngredient extends Model
{
    use HasFactory;
    protected $primaryKey = 'md_ingredient_id';
    protected $guarded = ['md_ingredient_id'];
}
