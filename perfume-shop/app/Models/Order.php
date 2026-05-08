<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parfum_id',
        'requested_quantity',
        'phone_number',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function parfum() {
        return $this->belongsTo(Parfum::class);
    }
}