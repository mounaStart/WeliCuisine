<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Session ;
 use Illuminate\Support\Facades\Validator ;
use App\Models\phot_plat ;

use App\Models\contenue_menu ;
 
use App\Models\restaurant;
class CartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  public function storequantity($rowId ,Request $request){
    //     $phot_plats =  phot_plat::find($request->id_phot_plat) ;
    //     // dd($phot_plats->Prix_phot_plat);
    //   $pric =  $phot_plats->Prix_phot_plat ;
    //   $quantyte =  $request->quantity ;

    //   $totatl = $pric * $quantyte ;
    // //   dd($totatl);
    
    //     return    redirect()->route('quantity' ,  $request->id_phot_plat)->with('success','Le produit a été déja ajouter .');
       
    //  }

    public function index(Request $request)
    {
        //
      $cartItem = Cart::content() ;
      $totatl = 0 ;
      return view('cart.index', compact('totatl','cartItem'));

    }
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store($rowId = null , Request $request)
    {
        //

        // 
        $restaurants = restaurant::find($request->id_restaurant);
      $duplicata =   Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id  == $request->id_plat ; 
        });
        $phot_plats =  phot_plat::find($request->id_plat) ;
        
        // dd($phot_plats->Id_Plat) ;
         $plats =  contenue_menu::find($phot_plats->Id_Contenue) ;
       
        if($duplicata->isNotEmpty()){
           
            return  back()->with('success','Le produit a été déja ajouter .');
        }

     
       

      
        // dd($plats->Prix_Plat ) ;
        Cart::add($phot_plats->Id , $phot_plats->photo , 1 ,  $plats->Prix_Plat)
        ->associate('App\Models\phot_plat');
        
        return    back()->with('success','Le produit a été bien ajouter .') ;
    
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
    public function update( Request $request , $rowId = null  )
    {
        // $cart = Cart::content()->where('rowId', $request->id);
        // //update quantity
        // //dd($cart);
        // return view('pages.cart')->with('cart-success', 'Cart updated');
        // // //
        $data = $request->json()->all() ;

        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,10',
        ]);
 
        if ($validator->fails()) {
            Session::flash('danger', 'La quantité du produit ne doit pas dépassé 10');
            return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
        }
        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'La qty du produit est passée à '.$data['qty'] ) ;
        return response()->json(['success' => 'qty update']);
        //     // return back()->with('success' , 'le produits à été supprimer .') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //
        Cart::remove($rowId) ;
        return back()->with('success' , 'le produits à été supprimer .') ;
    }
}
