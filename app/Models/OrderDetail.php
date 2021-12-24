<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $fillable = [
        'ordered_user_id', 'foodName', 'price', 'quantity'
    ];
}
