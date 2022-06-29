<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function edit() {
        return view('profile.edit');
    }

    public function editRequest(Request $request) {
        $currentUser = Auth::user();

        $currentUser->avatar = $request->file('uploadFile')->store('avatar');

        if ($currentUser->save()) {
            return redirect()->route('profile.index');
        }
    }

    public function myCart() {
        $currentUserId = \auth()->user()->id;

        $cart = Cart::with('product')
            ->where('user_id', $currentUserId)
            ->get();

        return view('profile.cart', compact('cart'));
    }

    public function deleteProductFromCart($id) {
        $cart = Cart::where('id', $id)->delete();

        if ($cart) {
            return redirect()->route('profile.cart');
        }
    }
}
