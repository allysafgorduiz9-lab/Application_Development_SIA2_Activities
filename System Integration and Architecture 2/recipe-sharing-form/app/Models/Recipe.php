<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // These MUST match the "name" attributes in your HTML form
    protected $fillable = [
        'recipe_name',
        'chef_email',
        'prep_time',
        'origin_country',
        'ingredients',
        'instructions',
    ];
}