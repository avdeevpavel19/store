<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $user = User::with('reviews')->find($currentUserId);
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function editRequest(Request $request)
    {
        $currentUser = Auth::user();

        $currentUser->avatar = $request->file('uploadFile')->store('avatar');

        if ($currentUser->save()) {
            return redirect()->route('profile.index');
        }
    }

    public function userCart()
    {
        $currentUserId = \auth()->user()->id;

        $cart = Cart::with('product')
            ->where('user_id', $currentUserId)
            ->get();

        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item->product->price;
        }

        return view('profile.cart', compact('cart', 'totalPrice'));
    }

    public function deleteProductFromCart($id)
    {
        $cart = Cart::where('id', $id)->delete();

        if ($cart) {
            return redirect()->route('profile.cart');
        }
    }
}
