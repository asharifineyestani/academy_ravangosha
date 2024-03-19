<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','book_stock_id','quantity'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
        return $this->belongsTo(BookStock::class, 'book_stock_id', 'id');
    }



    public static function totalQuantity()
    {
        return self::where('user_id', Auth::id())
            ->sum('quantity');
    }



    // متد برای محاسبه قیمت کل سبد خرید
    public static function totalPrice()
    {
        $totalPrice = 0;
        $carts = self::where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            $totalPrice += $cart->quantity * $cart->stock->price;
        }

        return $totalPrice;
    }


}
