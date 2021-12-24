<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodChef extends Model
{
    public $table = 'food_chefs';
    use HasFactory;

    protected $fillable = [
        'name', 'speciality', 'image'
    ];
}
