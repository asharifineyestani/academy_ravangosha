<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStock extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'user_id', 'quantity', 'price','status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
