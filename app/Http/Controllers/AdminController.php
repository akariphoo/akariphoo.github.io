<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Food;
use App\Models\FoodChef;
use App\Models\OrderDetail;
use App\Models\OrderedUser;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function user() {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function showFoodMenu(Food $food) {
        $foods = Food::all();
        return view('admin.foodMenu.index', compact('foods'));
    }

    public function createFoodMenu() {
        return view('admin.foodMenu.create');
    }

    public function storeFoodMenu(Request $request) {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $fileName = auth()->id() . '_' . time() . '.'. $request->image->extension();
        $type = $request->image->getClientMimeType();
        $size = $request->image->getSize();

        $request->image->move(public_path('images/foodimages'), $fileName);

        Food::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $fileName,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function deleteFoodMenu(Food $food, $id) {
        $food = Food::find($id);
        $food->delete();

        return redirect()->back();
    }

    public function updateViewFoodMenu(Food $food, $id) {
        $food = Food::find($id);

        return view('admin.foodMenu.update', compact('food'));
    }

    public function updateFoodMenu(Request $request, $id) {

        $food = Food::find($id);

        $image = $request->image;
       if($image) {
        $fileName = auth()->id() . '_' . time() . '.'. $request->image->extension();

        $type = $request->image->getClientMimeType();
        $size = $request->image->getSize();

        $request->image->move(public_path('images/foodimages'), $fileName);

        $food->update([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $fileName,
            'description' => $request->description,

        ]);
       }

       else {
            $food->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            ]);
       }
       $foods = Food::all();
       return redirect('showFoodMenu');
    }

    public function reservation(Request $request) {

         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    public function showReservation() {

        $user_type = User::where('id', '=', Auth::id())->get();
        foreach($user_type as $userType){
            $type = $userType->userType;
        }

        if(Auth::id() && $type == 1) {
            $reservations = Reservation::all();
            return view('admin.reservation.index', compact('reservations'));
        }
        else {
            return redirect('login');
        }

    }

    public function searchDate(Request $request) {

        $searchDate = $request->date;

        $search_data = Reservation::where('date', '=', $searchDate)->get();
        $reservations = $search_data;

        return view('admin.reservation.index', compact('reservations'));

    }

    public function viewFoodChef() {

        $chefs = FoodChef::all();
        return view('admin.foodChef.index', compact('chefs'));
    }

    public function createFoodChef() {

        return view('admin.foodChef.create');
    }

    public function storeFoodChef(Request $request) {

        $request->validate([
            'name' => 'required',
            'speciality' => 'required',
        ]);

        $fileName = auth()->id() . '_' . time() . '.'. $request->image->extension();
        $type = $request->image->getClientMimeType();
        $size = $request->image->getSize();

        $request->image->move(public_path('images/chefImages'), $fileName);

        FoodChef::create([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'image' => $fileName,
        ]);

        return redirect()->back();
    }

    public function deleteFoodChef($id) {

        $chef = FoodChef::find($id);
        $chef->delete();
        return redirect()->back();
    }

    public function updateFoodChefView($id) {

        $chef = FoodChef::find($id);
        return view('admin.foodChef.update', compact('chef'));
    }

    public function updateFoodChef(Request $request, $id) {

        $chef = FoodChef::find($id);
        $image = $request->image;
       if($image) {
        $fileName = auth()->id() . '_' . time() . '.'. $request->image->extension();

        $type = $request->image->getClientMimeType();
        $size = $request->image->getSize();

        $request->image->move(public_path('images/chefImages'), $fileName);

        $chef->update([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'image' => $fileName,

        ]);
       }

       else {
            $chef->update([
                'name' => $request->name,
                'speciality' => $request->speciality,
            ]);
       }

       return redirect('viewFoodChef');
    }

    public function showOrder() {

        $orders = OrderedUser::all();
        return view('admin.order.index', compact('orders'));
    }

    public function orderDetail($id) {

        $ordered_user_name = OrderedUser::select('name')->where('id', '=', $id)->get();
        foreach($ordered_user_name as $ordered_user_name) {
            $user_name = $ordered_user_name->name;
        }

        $order_user = OrderedUser::select('*')->where('id', '=', $id)->get();
        foreach($order_user as $order_user) {
            $user_id = $order_user->user_id;
            $ordered_user_id = $order_user->id;
        }

        $order_datails = OrderDetail::select('*')->where('ordered_user_id', '=', $id)->get();
        return view('admin.order_datail.index', compact('order_datails', 'user_name', 'user_id', 'ordered_user_id'));
    }

    public function search(Request $request) {

        $search = $request->search;
        $search_data = OrderedUser::where('name', 'Like', '%'.$search .'%')->get();
        $orders = $search_data;
       return view('admin.order.index', compact('orders'));
    }

    public function orderConfirm($id) {

        $email = User::select('email')->where('id', '=', $id)->get();

        foreach($email as $e) {
            $user_email = $e->email;
        }

        $messages = [
            'title' => 'Food Order System',
            'body' => 'Thank you for your order',
        ];

        Mail::to($user_email)->send(new MyMail($messages));
        return redirect()->back();
    }

    public function orderCancel($id) {

        $ordered_user = OrderedUser::find($id);
        $ordered_user->delete();
        return redirect('showOrder');
    }
}
