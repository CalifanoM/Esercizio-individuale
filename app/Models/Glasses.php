<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glasses extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_glasses';

    protected $fillable = [
        'price',
        'id_employee',
        'id_category',
        'id_color',
        'id_type',
        'id_brand'
    ];

}
