<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe ;
use Stripe\PaymentIntent ;

use App\Models\commander ;
use App\Models\commande_plat ;
use App\Models\paiment ;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use DateTime ;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
class PaimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Cart::count() <= 0 ){
            return redirect()->route('home') ;
        }
     
        Stripe::setApiKey('sk_test_51JqLCwHksddvc4OPWzLeZvmzCyL5KEaERZmUgg7hYNx0a356dDUzh92sKynayLHtgJm4Xk4vZIdREyFdZtLTMZKt00iAKxuygu');

        $intent = PaymentIntent::create([
            'amount' => round(Cart::total() ),
            'currency' => 'eur',
            'payment_method_types' => [ 'card'],
            // 'metadata' => [Auth::user()->id]                 
        ]);
        $client_secret = Arr::get($intent , 'client_secret') ;
        if(Auth::user() == null){
          return   redirect('login/client') ;
        }
        else{
            return view('checkout.index'
            ,[
                'client_secret' => $client_secret
            ])->with('login', 'bien logue') ;
        }
              
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
        $data = $request->json()->all() ;

        $order = new commander();
       
            $order->Id_Paiment = $data['paymentIntent' ]['id']  ;
             $order->user_Id = Auth::user()->id ;
            $order->save() ;
        $plats_command = new commande_plat() ;
            $plats_command->Id_Commande =  $order->id ;
                foreach(Cart::content() as $plat ){ $plats_command->Id_Plat =  $plat->model->plats->Id;}
            $plats_command->save();
        $paiment = new paiment() ; 
            $paiment->Montant_Paye = $data['paymentIntent' ]['amount']  ;
            $paiment->Mode_Paiment =  $data['paymentIntent' ]['payment_method_types'][0]  ;
            $paiment->Date_Paiment = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s') ;
            $paiment->Id_Client = Auth::user()->id  ; 
            $paiment->save() ;
        
         if($data['paymentIntent']['status'] === 'succeeded'){
            Cart::destroy() ;
            Session::flash('success', 'Votre commande à éte bien price en compte') ;
            return response()->json(['success' => 'payment INTENT succeeded']);
        }
        else{
            return response()->json(['error' => 'payment INTENT not succeeded']);
        }
    }
            
    

    public function thankyou(){
        return  Session::has('success') ?  view('checkout.thankyou')  : redirect()->route('home');
    }
        // foreach (Cart::content() as $product ) {
        //     $product['product_'. $i][] = $product->model->Nom_Plat;
        //     $product['product_'. $i][] = $product->model->Prix_Plat;
        //     $product['product_'. $i][] = $product->qty;
        //     $i++ ;
        //     # code...
        // }
        // $order->product =  serialize($product) ;

        // $order->user_Id = 13 ;

        // $order->save() ;

        // if($data['paymentIntent']['status'] === 'succeeded'){
        //     Cart::destroy() ;
        //     Session::flash('success', 'Votre commande à éte bien price en compte') ;
        //     return response()->json(['success' => 'payment INTENT succeeded']);
        // }
        // else{
        //     return response()->json(['error' => 'payment INTENT not succeeded']);
        // }
       
    //    return $data['paymentIntent'] ;
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
