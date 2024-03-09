<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'events_number',
        'category_id'
    ];
}
