<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\User;
use App\Payment;

class CheckoutController extends Controller
{
    
    public function checkout(){
       return view('reservations.checkout');
    }
    public function payment(Request $request){
       
    try{    
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $user = User::find(Auth()->user()->id);
        $user->stripe_token = $request->stripeToken;
        Payment::create(array(
            'user_id' => Auth()->user()->id,
            'amount' => '500' ,
            'currency' => 'usd'
            
        ));
        
        return 'Charge successful, you get the course!';

        } catch (\Exception $ex) {
    return $ex->getMessage();
        }

     }
}
