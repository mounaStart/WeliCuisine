<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Models\phot_plat ;
use App\Models\plat ;

use App\Models\restaurant;
class CartController2 extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  public function storequantity($rowId ,Request $request){
    //     $plats =  plat::find($request->id_plat) ;
    //     // dd($plats->Prix_Plat);
    //   $pric =  $plats->Prix_Plat ;
    //   $quantyte =  $request->quantity ;

    //   $totatl = $pric * $quantyte ;
    // //   dd($totatl);
    
    //     return    redirect()->route('quantity' ,  $request->id_plat)->with('success','Le produit a été déja ajouter .');
       
    //  }
    public function store($rowId = null , Request $request)
    {
        //

        
        $restaurants = restaurant::find($request->id_restaurant);
      $duplicata =   Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id  == $request->id_plat ; 
        });
        if($duplicata->isNotEmpty()){
           
            return redirect()->route('visiterestau.index' ,  $restaurants)->with('success','Le produit a été déja ajouter .');
        }

       

        $plats =  plat::find($request->id_plat) ;
        
      
        
        Cart::add($plats->Id , $plats->Nom_Plat , 1 ,  $plats->Prix_Plat )
        ->associate('App\Models\plat');
        
        return   redirect()->route('visiterestau.index2' ,  $restaurants)->with('success','Le produit a été bien ajouter .') ;
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      $cartItem = Cart::content() ;
      $totatl = 0 ;
      return view('cart.index2', compact('totatl','cartItem'));

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
    public function update( $rowId)
    {
        //
        Cart::update($rowId, [
            'quantity' => [
            'relative' => false, 
            'value'=> request('quantity')
            ]
            ]);
            return back()->with('success' , 'le produits à été supprimer .') ;
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
