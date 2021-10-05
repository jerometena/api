<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'paid',
        'rate',
        'status',
        'reading_date',
        'disconnection_date',
        'due_date',
        'image',
        'consumer_id',
        'user_id',
        'user_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }
}
