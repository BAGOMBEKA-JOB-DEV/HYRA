<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Logic to check if the cart is empty
        // Here, I'm assuming you have a Cart model or some way to track the user's cart.
        $cartItems = session()->get('cart', []);

        // Pass the cart data to the view
        return view('cart.index', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request)
    {
        // Logic for adding an item to the cart
        $cart = session()->get('cart', []);

        // Assuming the request contains the product ID and quantity
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Add item to cart
        $cart[$productId] = [
            'product_id' => $productId,
            'quantity' => $quantity,
        ];

        // Save cart in session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function removeFromCart($productId)
    {
        // Logic for removing an item from the cart
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
