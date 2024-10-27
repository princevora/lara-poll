<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_name',
        'poll_id',
        'poll_fields'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
