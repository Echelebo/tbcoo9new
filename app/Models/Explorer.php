<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explorer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'balance',
        'ref',
        'description',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
