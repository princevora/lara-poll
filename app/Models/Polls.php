<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_name',
        'poll_id',
        'poll_fields'
    ];
}
