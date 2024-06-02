<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'owner_id',
        'store_name',
        'store_email',
        'description',
        'logo',
        'rating',
    ];
}
