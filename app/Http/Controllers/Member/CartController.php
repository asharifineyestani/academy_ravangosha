<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\BookStock;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Cart::with('stock')->where('user_id', $user->id)->get();



        return view('member.carts.index', compact('items'));
    }

    public function addToCart(Request $request)
    {


        $user = Auth::user();
        $bookStockId = $request->input('book_stock_id');
        $quantity = 1;

        // Check if the book stock exists
        $bookStock = BookStock::find($bookStockId);
        if (!$bookStock) {
            return redirect()->back()->with('error', 'Book stock not found');
        }

        // Check if requested quantity is available
        if ($quantity > $bookStock->quantity) {
            return redirect()->back()->with('error', 'Requested quantity not available');
        }

        // Check if the book is already in the cart, then update quantity
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('book_stock_id', $bookStockId)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'book_stock_id' => $bookStockId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('member.carts.index')->with('success', 'Book added to cart successfully');
    }

    public function updateCart(Request $request, $id)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$cartItem) {
            return redirect()->route('member.carts.index')->with('error', 'Cart item not found');
        }

        $quantity = $request->input('quantity');
        if ($quantity <= 0) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('member.carts.index')->with('success', 'Cart updated successfully');
    }

    public function removeFromCart($id)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$cartItem) {
            return redirect()->route('member.carts.index')->with('error', 'Cart item not found');
        }

        $cartItem->delete();

        return redirect()->route('member.carts.index')->with('success', 'Item removed from cart successfully');
    }


    public function increase($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity += 1;
        $cart->save();

        return redirect()->back();
    }

    // Decrease quantity by one
    public function decrease($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
        }

        return redirect()->back();
    }
}



