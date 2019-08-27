<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request, $cuisine_id, $restaurant_id)
    {
        $user = Auth::user();
        return $user->cart->cuisines;
    }
}
