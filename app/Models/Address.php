<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'house_number',
        'lot_number',
        'street_name',
        'barangay',
        'city',
        'zip_code',
        'country'
    ];
    use HasFactory;
}
