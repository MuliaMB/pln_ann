<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarduInduk extends Model
{
    use HasFactory;

    protected $table = 'gardu_induks';

    protected $fillable = [
        'nama',
    ];
}
