<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'team_id',
        'user_id',
        'score',
    ];
    use HasFactory;
}
