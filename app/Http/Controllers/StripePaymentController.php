<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Categories;
use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Stripe\Charge;
use Stripe;

class StripePaymentController extends Controller
{
    public function paymentCheckout()
    {   $cartItems = \Cart::content();
        $data ['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
    $data ['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
        // return $cartItems;
        return view('site.stripeCheckout',$data,  compact('cartItems'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentCheckoutStore(Request $request)
    {  
        
        // storing cart animal data to an associative array for storing json format in db
        $cartItems = \Cart::content();
        $animalData = [];

        foreach ($cartItems as $item) {
           $animalData[] = [
            'id'         => $item->id,
            'name'       => $item->name,
            'qty'        => $item->qty,
            'subtotal'   => $item->subtotal,
           ];
        }

        // create order
        $order = new Order();
        $order->user_id             = auth()->id();
        $order->animal              = json_encode($animalData);
        $order->amount              = $request->amount;
        $order->card_number         = $request->card_number;
        $order->name                = $request->name;
        $order->email               = $request->email;
        $order->phone               = $request->phone;
        $order->city                = $request->city;
        $order->post_code           = $request->post_code;
        $order->shipping_address    = $request->shipping_address;
        $order->status              = OrderStatusEnum::PENDING;

        // stripe payment create
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment =   Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order payment from Pet Universe.",
            "shipping" => [

                "name" => $request->name,

                "address" => [

                    "line1" => "",

                    "postal_code" => $request->post_code,

                    "city" => $request->city,

                    "state" => "CA",

                    "country" => "US",

                ],

            ]
        ]);
        
        Session::flash('success', 'Payment successful!');
        
        if(Session::has('success')){
            $order->payment_id = $payment->id;
            $order->save();
        }
        return back();
    }
}
