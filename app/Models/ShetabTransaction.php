<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShetabTransaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'back_url',
        'amount',
        'status',
        'transactionId',
        'driver',
        'details',
    ];


    protected $casts = [
        'details' => 'json'
    ];


    public function scopeGetAmount($transactionId)
    {
        $row = $this->where('transactionId', $transactionId)->first();
        if ($row)
            return $row->amount;

    }

}



