<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodChef;
use App\Models\OrderDetail;
use App\Models\OrderedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        if(Auth::id()) {
           return redirect('redirects');
        }
        else
        $foods = Food::all();
        $chefs = FoodChef::all();
        return view('index', compact('foods', 'chefs'));
    }

    public function redirects() {

        $userType = Auth::user()->userType;

        if($userType == 1) {
            return view('admin.adminHome');
        }
        else {
            $foods = Food::all();
            $chefs = FoodChef::all();

            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();

            return view('index', compact('foods', 'chefs', 'count'));
        }
    }

    public function addtoCart(Request $request, $id) {

        $food_id = $id;
        $quantity = $request->quantity;

        if(Auth::id()) {
            $user_id = Auth::id();

            Cart::create([
                'user_id' => $user_id,
                'food_id' => $food_id,
                'quantity' => $quantity,
            ]);

            return redirect()->back();
        }
        else {

            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id) {

        if(Auth::id() == $id) {
            $count = Cart::where('user_id', $id)->count();
            // $foods = Cart::select('*')->join('foods', 'carts.food_id', '=', 'foods.id')->get();

             //$carts = Cart::select('*')->where('user_id', '=', $id)->get();

             $foods = Food::select('*')->leftjoin('carts', 'foods.id', '=', 'carts.food_id')->where('carts.user_id', '=', $id)->get();

             return view('showCart', compact('count','foods'));
        }
        else {
            return redirect()->back();
        }

    }

    public function removeFromCart($id) {

        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function orderConfirm(Request $request) {

        $user_id = Auth::id();

        OrderedUser::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $ordered_user_id = OrderedUser::select('id')->get()->last();

        foreach($request->foodName as $key => $foodName) {
            OrderDetail::create([
                'ordered_user_id' => $ordered_user_id->id,
                'foodName' => $foodName,
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
            ]);
        }

        $carts = DB::delete('delete from carts');


        return redirect('redirects');
    }
}
