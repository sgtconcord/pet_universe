<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{

    public function cartList()
    {
        $cartItems = Cart::content();
        $data ['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
    $data ['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
        // return session()->all();
        return view('site.cart_page',$data, compact('cartItems'));
    }
    
    public function store(Request $request)
    {
        $animal_id = $request->id;
        $animal = Animal::find($animal_id);

        // return $request;

        if ($animal) {
            if ($animal->discount_price === null) {
                \Cart::add([
                    'id' => $animal->id,
                    'name' => $animal->name,
                    'price' => $animal->selling_price,
                    'quantity' => 1,
                    'image' => $animal->image,
                    'weight' => '1',
                    'qty' => '1',
                    'tax' => '0',
                    'options' => ['image' => $animal->image],
                ]);
            } else {
                \Cart::add([
                    'id' => $animal->id,
                    'name' => $animal->name,
                    'price' => $animal->discount_price,
                    'quantity' => 1,
                    'image' => $animal->image,
                    'weight' => '1',
                    'qty' => '1',
                    'tax' => '0',
                    'options' => ['image' => $animal->image],
                ]);
            }

            if ($request->ajax()) {
                return response()->json(['message' => 'Product added to cart successfully!']);
            }

            session()->flash('success', 'Product is Added to Cart Successfully !');
            $status = "Cart Added Successfully";
            return RedirectHelper::routeSuccess2('shopping.cartlist', $status);
        } else {
            if ($request->ajax()) {
                return response()->json(['message' => 'Animal not found. Unable to add to cart.'], 404);
            }

            session()->flash('error', 'Animal not found. Unable to add to cart.');
            $status = "Error";
            return RedirectHelper::routeError('shopping.cartlist', $status);
        }
    }



    public function removeCart($rowId)
    {

        $rowId = \Cart::content()->value('rowId');
        \Cart::remove($rowId);

        $message = 'Item Cart Remove Successfully !';
        return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
    }



}
