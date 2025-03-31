<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;

    // Define table name if it's not the default plural of 'Prediction'
    protected $table = 'predictions'; // Optional if your table follows the default naming convention

    // Define fillable fields
    protected $fillable = [
        'Brand',
        'model',
        'Year',
        'Age',
        'kmDriven',
        'Transmission',
        'Owner',
        'FuelType',
        'predicted_price'
    ];

    // Disable timestamps if not needed
    public $timestamps = false;
}
