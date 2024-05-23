<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'owner',
        'store_name',
        'store_email',
        'description',
        'logo',
        'rating',
    ];
}