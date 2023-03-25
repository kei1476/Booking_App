<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Book;

class PaymentsController extends Controller
{
    public function paymentPage(Request $request){
        $shop = $request->all();

        return view('payment.payment_page',compact('shop'));
    }

    public function pay(Request $request){
         try{

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->price,
                'currency' => 'jpy'
            ));

            Book::where('id',$request->book_id)->update([
                'payment' => 1,
            ]);


            return view('payment.pay_complete');

        }catch(Exception $e){
            return $e->getMessage();
        }
     }


}
