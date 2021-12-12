<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\eleve;
use App\agentr;
use App\Models\type_menu;
use App\Models\menu_type_menu;
use App\Models\menu;
use App\Models\restaurant_menu;
use App\Models\plat;
use App\Models\contenue_menu ;
use App\Models\menu_contenue_menu ;
use App\Models\restaurant;
use App\Models\addresse;
use App\Models\phot_plat;

use  App\Mail\AgentrMailable ;
use Illuminate\Support\Facades\Mail;

use App\client;
use AuthenticatesUsers;
use Validator,Redirect,Response;
Use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class RestoController extends Controller
{
    //Page d'acceil 
    public function indexResto($slug = null)
    {
       
    

        $menu_principal = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Menu Principal')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
       ->get() ;

        $menu_principal_count = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Menu Principal')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->count() ;

        $Desserts = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Dessert')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->get() ;

        $Desserts_count = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Dessert')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->count();

        //Type  boisson

        $Boissons = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Boisson')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->get() ;
        $Boissons_count = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Boisson')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->count();

        //type Entrée
        $Entrées = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Entrée')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->get() ;

        $Entrées_count = DB::table('restaurants')
        ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
        ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
        ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
        ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
        ,\DB::raw('COUNT(*) as cnt'))->distinct()
        ->where('tm.Type_Menu' ,'='  ,'Entrée')
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->groupBy('c.Nom_Ligns')
        ->count();
       
        //Restaurant par ville
        $villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
       ->distinct()
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->where('restaurants.Nombre_Visite','>=' ,5)
        ->groupBy('ad.ville')
        ->get();
        $restaurants_villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
        ->join('restaurant_menus as rm', 'rm.Id_Restaurant' ,'=','restaurants.Id_Restau') 
        ->where('restaurants.publier' ,'='  ,'oui') 
         ->where('restaurants.Nombre_Visite','>=' ,5)
        
         ->get()
        ;
      
        $Type_menu_Restau_Polulaires = restaurant::join('restaurant_menus as rm', 'rm.Id_Restaurant' ,'=','restaurants.Id_Restau')
        ->join('menus as m','rm.Id_Menu','=','m.Id')
        ->join('menu_type_menus as mt','m.Id','=','mt.Id_Menu')
        ->join('type_menus as tm','mt.Id_Type_Menu','=','tm.Id')
        ->join('plats as p','tm.Id','=','p.Id_type_menu')->distinct()
        ->groupBy('p.Id_type_menu')->get()
         ;
        return view('layouts.home',
        ['Type_menu_Restau_Polulaires'=>$Type_menu_Restau_Polulaires ,'villes'=>$villes ,'restaurants_villes'=>$restaurants_villes,'Desserts_count'=>$Desserts_count,'menu_principal_count'=>$menu_principal_count,'Boissons_count'=>$Boissons_count,'Entrées_count'=>$Entrées_count,
        'Entrées'=>$Entrées ,'Boissons'=>$Boissons,'Desserts'=>$Desserts,'menu_principal' => $menu_principal ,'layout'=>'ProfilAgentResto']);
    } 
    //New Restaurant 
    public function NewResto($slug = null)
    {
      
        $agentrs = agentr::all() ;
        return view('layouts.newResto',['agentrs'=>$agentrs,'layout'=>'newResto']);
    } 
    //placeholderemail
    public function placeAgentrMailable($request){
      $agentr_data = [
        'email' => $request->input('email') ,
        'password' => $request->input('password') ,
         'name'=> $request->input('nom') ,
      ] ;
      $to_customer_email = $request->input('email') ;
      Mail::to($to_customer_email)->send(new AgentrMailable($agentr_data));
     
    
    }
    //Save restaurant 
    public function storeResto(Request $request )
    {
        $agentrs = new agentr() ;
        $agentrs->Num_Agent=  3;
        $agentrs->name= $request->input('nom') ;
        $agentrs->Prenom_AgentR= $request->input('prenom') ;
        $agentrs->email= $request->input('email') ;
        $agentrs->password= $request->input('password') ;
        $agentrs->Num_Tel= $request->input('phone') ;
        $agentrs->Sexe= $request->input('sexe') ;
        $agentrs->save() ;

        $restaurants =new  restaurant() ;
        $restaurants->Nom_Restau= $request->input('nomR') ;
        $restaurants->Id_AgentR= $agentrs->Id ;
        $restaurants->save() ;
        
        $addresses = new addresse() ;
        $addresses->ville= $request->input('addresse') ;
        $addresses->save() ;

        // if($agentrs != null){
        //     MailController::sendSignupEmail($agentrs->name , $agentrs->email ,$agentrs->verification_code) ;
        //           return redirect()->back()->with(session()->flash('alert-success' ,'email envoyer ')); 
        // }
        //Send mail 
       $this->placeAgentrMailable($request) ;
        return redirect()->back()->with(session()->flash('alert-dang' ,'email envoyer '));  ;
   }
   //Profil agent Restaurant 
   public function ProfilAgentResto($slug = null)
    { 
      
      $menus = menu::all() ;
      $restaurants_menu = restaurant_menu::all() ;
      $restaurants = restaurant::all() ;
      $contenue_menus = contenue_menu::all() ;
      $menu_contenue_menus = menu_contenue_menu::all() ;
      $type_menus = type_menu::all() ;

       
      $total_restaura = DB::table('restaurants as r')
      ->where('r.Id_AgentR' , '=' ,Auth::user()->id)->count() ;
      
          $agentrs = agentr::all() ;
       
          $menu_type_menus = menu_type_menu::all() ;
          $plats = contenue_menu::all() ;
          $phot_plats = phot_plat::all() ;

            $total_visitRestau = DB::table('restaurants')
            ->select('restaurants.Id_Restau',\DB::raw('SUM(restaurants.Nombre_Visite) as tvisite'))->distinct()
               ->where('restaurants.Id_AgentR' , '=' ,Auth::user()->id)->get() ;
               
            $list_commande = DB::table('restaurants as r')
            ->join('restaurant_menus as rm', 'r.Id_Restau', '=', 'rm.Id_Restaurant')
            ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
            ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
            ->join('contenue_menus as cm', 'cm.Id',  '=', 'mc.id_contenue_menu')
            ->join('type_menus as tm', 'tm.Id', '=', 'cm.Id_type_menu')
             ->join('commande_plats as cp','cp.Id_Plat','=','cm.Id' )
             ->join('commanders as c' ,'c.id','=','cp.Id_Commande')
             ->join('paiments as pa','pa.Id','=','c.Id_paiments')
             ->join('clients as cl', 'cl.id','=','c.user_Id')
             ->where('r.Id_AgentR' , '=' ,Auth::user()->id)
  
             ->get() ;

             $menuTotal_commande = DB::table('restaurants as r')
             ->join('restaurant_menus as rm', 'r.Id_Restau', '=', 'rm.Id_Restaurant')
             ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
             ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
             ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
             ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')

             ->join('commande_plats as cp','cp.Id_Plat','=','p.Id' )
             ->join('commanders as c' ,'c.id','=','cp.Id_Commande')
             ->join('paiments as pa','pa.Id','=','c.Id_paiments')
             ->join('clients as cl', 'cl.id','=','c.user_Id')
             ->where('r.Id_AgentR' , '=' ,Auth::user()->id)
             ->count() ;

          return view('agentr',['total_restaura'=>$total_restaura,'menu_contenue_menus'=>$menu_contenue_menus,'contenue_menus'=>$contenue_menus,
          'list_commande'=>$list_commande ,'menuTotal_commande'=> $menuTotal_commande,'total_visitRestau'=>$total_visitRestau ,'plats' => $plats,
          'phot_plats' => $phot_plats ,'menu_type_menus'=>$menu_type_menus ,'type_menus'=>$type_menus ,'menus'=>$menus,'restaurant_menus'=> $restaurants_menu,'restaurants'=>$restaurants,'agentrs'=>$agentrs ,'layout'=>'ProfilAgentResto']);
    }
    //Change photo 

    public function update( Request $request , $rowId = null  )
    {
        $photo = $request->file('photo') ;
        $Id_Restau = $request->input('Id_Restau') ;
        $sql = "update restaurants set photo = '$photo' where Id_Restau = '$Id_Restau'"  ;
          \DB::update($sql) ;

        Session::flash('success', 'La qty du produit est passée à '.$data['qty'] ) ;
        return response()->json(['success' => 'qty update']);
    }
    public function ChangePhoto(Request $request , $Id= null){

      $photo = $request->input('photo') ;
        $Id_Restau = $request->input('id_restau') ;
        $restaurants = new restaurant() ;
        $image_name  ;
        
          if($request->hasFile('photo'))
          {
           

            $destination_path = 'public/img/plats' ;
          $image =  $request->file('photo') ;
            $image_name = $image->getClientOriginalName() ;
            if( $image_name  != null)
            {
            $path = $request->file('photo')->storeAs($destination_path,$image_name);
            $restaurants['photo'] = $image_name ;
          }
          $sql = "update restaurants set photo = '$image_name' where Id_Restau = '$Id_Restau'"  ;

          \DB::update($sql) ;
        }
       
        
        // return  Session::has('agentConnecte') ?  view('agentr')  : redirect('login/agentr');
     
          return redirect('/agentr') ;
      
    }
     //Type menu 
     public function type_menu($slug = null)
     {
        
         $type_menus = type_menu::all() ;
         
         return view('agentr',['type_menus'=>$type_menus]);
    
     }
     public function storeContenueMenu(Request $request)
    {
      //  Contenue menu store
      $contenue_menus = new contenue_menu() ;
      $contenue_menus->Id_type_menu = $request->input('tp') ;
      $contenue_menus->Nom_Ligns = $request->input('np') ;
      $contenue_menus->Descrip_Plat = $request->input('dp') ;
      $contenue_menus->Prix_Plat = $request->input('pp') ;
      $contenue_menus->save() ;
      //Menu contenue menu 
      $menu_contenue_menus = new  menu_contenue_menu() ;
      $menu_contenue_menus->id_menu = $request->input('nm') ;
      $menu_contenue_menus->id_contenue_menu = $contenue_menus->Id ;
      $menu_contenue_menus->save() ;

      //Photo des plat 
      $phot_plats = new phot_plat() ;
      if($request->hasFile('photo'))
        {
          $destination_path = 'public/img/plats' ;
         $image =  $request->file('photo') ;
          $image_name = $image->getClientOriginalName() ;
          $path = $request->file('photo')->storeAs($destination_path,$image_name);
          $phot_plats['photo']  = $image_name ;
        }
        
        $phot_plats ->Id_Contenue  =$contenue_menus->Id ;
       
        $phot_plats->save() ;


     

        // $menus = new menu() ;
        // $type_menus = new type_menu() ;
     						
        // $plats = new plat() ;
        // $menu_type_menus = new menu_type_menu() ;

        // $type = $request->input('tp') ;
        // $plats->type_menu()->associate($type);

        // $menu_type_menus->Id_Menu = $request->input('nm') ; 
        // $menu_type_menus->Id_Type_Menu = $request->input('tp') ; 

        // $menu_type_menus->save() ;

        // $plats->Nom_Plat = $request->input('np') ;
        // $plats->Descrip_Plat = $request->input('dp') ;
        // $plats->Prix_Plat = $request->input('pp') ;
        
        // $plats->save() ;	
        
 
        

        return redirect('/agentr') ;

    }
    //Store menu
    public function storemenu(Request $request)
    { 
        $menus = new menu() ;
        $menus->Nom_Menu = $request->input('nm')  ;
        $menus->save() ;

         $restaurants_menu = new restaurant_menu() ;
         $restaurants_menu->Id_Restaurant =  $request->input('nr') ;
         $restaurants_menu->Id_Menu =$menus->Id ;
         $restaurants_menu->save() ;
         return redirect('/agentr') ;
    }
    //Delete menu 
    public function DeleteMenu(Request $request){

      $nom_menu = $request->input('nom_menu') ;
      //  $Id_Restau = $request->input('id_restau') ;
     
        $sql = "delete from menus   where Id = '$nom_menu'"  ;
  
        
          \DB::delete($sql) ;
          return redirect('/agentr') ;


    }
    //Store plat
    public function store_plat_update(Request $request){
      $menu_nom = $request->input('nm') ;
      $nom_plat = $request->input('np') ;
      $descript_plat = $request->input('dp') ;
      $prix_plat = $request->input('pp') ;
      $type_plat = $request->input('tp') ;
      //$photo_plats = $request->input('photo') ;
      $Id_contenue_menu = $request->input('Id_contenue') ;

      if( $type_plat != null){
        $sql = "update contenue_menus set Nom_Ligns = '$nom_plat ' , Descrip_Plat = '$descript_plat' , Prix_Plat = '$prix_plat' ,
        Id_type_menu = '$type_plat' where Id = '$Id_contenue_menu'"  ;
       
        \DB::update($sql) ;
      }
     

      $phot_plats = new phot_plat() ;
      $image_name ;

      if($request->hasFile('photo'))
          {
            $destination_path = 'public/img/plats' ;
          $image =  $request->file('photo') ;
            $image_name = $image->getClientOriginalName() ;
            if( $image_name  != null)
            {
            $path = $request->file('photo')->storeAs($destination_path,$image_name);
            $phot_plats['photo'] = $image_name ;
          }
          $sql = "update phot_plats set photo = '$image_name' where Id_Contenue = '$Id_contenue_menu'"  ;

          \DB::update($sql) ;
        }
      return redirect('/agentr') ; 
    }
    public function DeletePlat(Request $request){
      $nom_plat = $request->input('nom_plat') ;
      //  $Id_Restau = $request->input('id_restau') ;
     
     
        $sql = "delete from contenue_menus   where Id = '$nom_plat'"  ;
  
          \DB::delete($sql) ;
          return redirect('/agentr') ;
    }
    //Profil client   
    public function ProfilClientResto($slug = null)
    { 
        $type_menus = type_menu::all() ;
        //  $agentrs_Trouve=agentr::find($slug) ;
          $plats =  contenue_menu::all() ;
          $agentrs = agentr::all() ;
          $menus = menu::all() ;
          $restaurants_menu = restaurant_menu::all() ;
          $restaurants = restaurant::all() ;
          $menu_type_menus = menu_type_menu::all() ;
         
          $phot_plats = phot_plat::all() ;

          $menu_principal = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Menu Principal')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
         ->get() ;
  
          $menu_principal_count = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Menu Principal')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->count() ;
  
          $Desserts = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Dessert')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->get() ;
  
          $Desserts_count = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Dessert')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->count();
  
          //Type  boisson
  
          $Boissons = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Boisson')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->get() ;
          $Boissons_count = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Boisson')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->count();
  
          //type Entrée
          $Entrées = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Entrée')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->get() ;
  
          $Entrées_count = DB::table('restaurants')
          ->join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
          ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
          ->join('menu_contenue_menus as mc', 'mc.id_menu',  '=', 'm.Id')
          ->join('contenue_menus as c', 'c.Id',  '=', 'mc.id_contenue_menu')
          ->join('type_menus as tm', 'tm.Id', '=', 'c.Id_type_menu')
          ->join('phot_plats as pp', 'c.Id',  '=', 'pp.Id_Contenue')
          ->select('c.Id','c.Id_type_menu','c.Nom_Ligns' ,'c.Descrip_Plat' ,'pp.photo', 'rm.Id_Restaurant' ,'c.Prix_Plat' ,'restaurants.Id_Restau'
          ,\DB::raw('COUNT(*) as cnt'))->distinct()
          ->where('tm.Type_Menu' ,'='  ,'Entrée')
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->groupBy('c.Nom_Ligns')
          ->count();
         
          //Restaurant par ville
          $villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
         ->distinct()
          ->where('restaurants.publier' ,'='  ,'oui') 
          ->where('restaurants.Nombre_Visite','>=' ,5)
          ->groupBy('ad.ville')
          ->get();
          $restaurants_villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
          ->join('restaurant_menus as rm', 'rm.Id_Restaurant' ,'=','restaurants.Id_Restau') 
          ->where('restaurants.publier' ,'='  ,'oui') 
           ->where('restaurants.Nombre_Visite','>=' ,5)
           ->get()
          ; 

          $Type_menu_Restau_Polulaires = restaurant::join('restaurant_menus as rm', 'rm.Id_Restaurant' ,'=','restaurants.Id_Restau')
          ->join('menus as m','rm.Id_Menu','=','m.Id')
          ->join('menu_type_menus as mt','m.Id','=','mt.Id_Menu')
          ->join('type_menus as tm','mt.Id_Type_Menu','=','tm.Id')
          ->join('plats as p','tm.Id','=','p.Id_type_menu')->distinct()
          ->groupBy('p.Id_type_menu')->get()
           ;

          return view('client',
          ['Type_menu_Restau_Polulaires'=>$Type_menu_Restau_Polulaires ,'villes'=>$villes ,'restaurants_villes'=>$restaurants_villes,'Desserts_count'=>$Desserts_count,'menu_principal_count'=>$menu_principal_count,'Boissons_count'=>$Boissons_count,'Entrées_count'=>$Entrées_count,
          'Entrées'=>$Entrées ,'Boissons'=>$Boissons,'Desserts'=>$Desserts,'menu_principal' => $menu_principal ,'layout'=>'ProfilAgentResto']);
  
        
         }
    public function visiterestauTotal( $id = null){
       
        $menus = menu::all() ;
        $restaurants_menu = restaurant_menu::all() ;
        $menu_type_menus = menu_contenue_menu::all() ;
        $type_menus = type_menu::all() ;
        // $plats = plat::all() ;
        $phot_plats = phot_plat::all() ;
      
        $plats = contenue_menu::find($id) ;
        $restaurants = restaurant::all();

      
        return view('/visiterestauTotal',['plats' => $plats, 'phot_plats' => $phot_plats ,'menu_type_menus'=>$menu_type_menus ,'type_menus'=>$type_menus ,'menus'=>$menus,
          'restaurants'=>$restaurants , 
        'restaurant_menus'=>$restaurants_menu  ]);
     
    }
    public function UpdatePlat( $id = null){
       
      $menus = menu::all() ;
      $restaurants_menu = restaurant_menu::all() ;
      // $menu_type_menus = menu_type_menu::all() ;
      $type_menus = type_menu::all() ;
      // $plats = plat::all() ;
      $phot_plats = phot_plat::all() ;
    
      $contenue_menus = contenue_menu::find($id) ;
      $restaurants = restaurant::all();

      return view('/layouts.update_plat',[
        'contenue_menus' =>$contenue_menus,
         'phot_plats' => $phot_plats ,
         'type_menus'=>$type_menus ,'menus'=>$menus,
        'restaurants'=>$restaurants , 
      'restaurant_menus'=>$restaurants_menu  ]);
   
  }

    public function findRestaurByClient( $id = null)
    {
        
        $menus = menu::all() ;
        $restaurants_menu = restaurant_menu::all() ;
        $menu_type_menus = menu_contenue_menu::all() ;
        $type_menus = type_menu::all() ;
        $plats = contenue_menu::all() ;
        $phot_plats = phot_plat::all() ;
      
        $restaurants = restaurant::find($id);
        
  
        return view('/visiterestau',['plats' => $plats, 'phot_plats' => $phot_plats ,'menu_type_menus'=>$menu_type_menus ,'type_menus'=>$type_menus ,'menus'=>$menus,
          'restaurants'=>$restaurants , 
        'restaurant_menus'=>$restaurants_menu  ]);
       }
       
       public function publierReso($id  = null )
       {
        
      
        $restaurants = restaurant::find($id);

        $restaurants->publier = 'oui' ;
        $restaurants->save() ;
      
        return redirect('/agentr')->with('popup', 'open');;
        
    }
    // public function  infoPanier($id  = null )
    // {
     
   
    
   
    //  return redirect('/infoPanier');
     

    // //Info panier 
    // }

    //Rechercher 
    public function Search(Request $request){

      $q = $request->input('q');
      $pays = $request->input('pays') ;
      $restaurants ="" ;
       $restaurants_villes = "" ;
       $total ;
       $restaurants_total = "";
       $restaurants_villes_vtotal ="";
       $resultat = " " ;
      if($q != null && $pays == null ){
        $restaurants=  restaurant::join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
        ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
        ->where('restaurants.publier' ,'='  ,'oui')
        ->where('p.Nom_Plat','like',"%$q%")
        ->orwhere('p.Descrip_Plat','like',"%$q%")
        ->orwhere('restaurants.Nom_Restau' ,'like' ,"%$q%")
        ->get() ;
        $restaurants_total=  restaurant::join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
        ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
        ->where('restaurants.publier' ,'='  ,'oui')
        ->where('p.Nom_Plat','like',"%$q%")
        ->orwhere('p.Descrip_Plat','like',"%$q%")
        ->orwhere('restaurants.Nom_Restau' ,'like' ,"%$q%")
        ->groupBy('p.Nom_Plat')
        ->count() ;
        $total = $restaurants_total ;
      }
      if($pays != null && $q == null){
        $restaurants_villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
        ->join('agentrs' , 'restaurants.Id_AgentR' ,'=', "agentrs.id")->distinct()
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->where('ad.ville','like',"%$pays%")->get();

        $restaurants_villes_vtotal=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' ,'ad.Id_Restaurant')
         ->join('agentrs' , 'restaurants.Id_AgentR' ,'=', "agentrs.id")->distinct()
         ->where('restaurants.publier' ,'='  ,'oui')
        ->where('ad.ville','like',"%$pays%")->count();

        $total = $restaurants_villes_vtotal ;
      }
      //if ville != null et plat ou restarant != null
      if($pays != null && $q != null){
        $restaurants=  restaurant::join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
        ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
        ->groupBy('p.Nom_Plat')
        ->where('p.Nom_Plat','like',"%$q%")
        ->where('p.Descrip_Plat','like',"%$q%")
        ->orwhere('restaurants.Nom_Restau' ,'like' ,"%$q%")
        ->get() ;

        $restaurants_villes=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' , 'ad.Id_Restaurant')
        ->join('agentrs' , 'restaurants.Id_AgentR' ,'=', "agentrs.id")->distinct()
        ->where('restaurants.publier' ,'='  ,'oui') 
        ->where('ad.ville','like',"%$pays%")->get();
        // $resultat = {{ $restaurants  $restaurants_villes }} ;
        //Total plat ou restaurant
        $restaurants_total =  restaurant::join('restaurant_menus as rm', 'restaurants.Id_Restau', '=', 'rm.Id_Restaurant')
        ->join('menus as m', 'm.Id', '=', 'rm.Id_Menu')
        ->join('menu_type_menus as mt', 'mt.Id_Menu', '=', 'rm.Id_Menu')
        ->join('type_menus as tm', 'tm.Id', '=', 'mt.Id_Type_Menu')
        ->join('plats as p', 'tm.Id',  '=', 'p.Id_type_menu')
        ->join('agentrs' , 'restaurants.Id_AgentR' ,'=', "agentrs.id")
        ->where('restaurants.publier' ,'='  ,'oui')
        ->where('p.Nom_Plat','like',"%$q%")
        ->where('p.Descrip_Plat','like',"%$q%")
        ->orwhere('restaurants.Nom_Restau' ,'like' ,"%$q%")
        ->groupBy('p.Nom_Plat')
        ->count() ;
        //Total restauant / ville 
        $restaurants_villes_vtotal=  restaurant::join('addresses as ad','restaurants.Id_Restau', '=' ,'ad.Id_Restaurant')
        ->join('agentrs' , 'restaurants.Id_AgentR' ,'=', "agentrs.id")->distinct()
        ->where('restaurants.publier' ,'='  ,'oui')
       ->where('ad.ville','like',"%$pays%")->count();

        
        $total =  $restaurants_total + $restaurants_villes_vtotal ;
      }
     
  
     return view('layouts.search',
     ['restaurants_villes'=> $restaurants_villes ,'restaurants'=>$restaurants,'total'=>$total ,
   'layout'=>'ProfilAgentResto']);
  }

public function viewplatDetail(Request $request ,$Id= null , $rowId = null){

  $menus = menu::all() ;
  $restaurants_menu = restaurant_menu::all() ;
  $menu_type_menus = menu_type_menu::all() ;
  $type_menus = type_menu::all() ;
  $plats = contenue_menu::find($rowId) ;
 
$photo_plat = $request->id;
$phot_plats = phot_plat::find($photo_plat) ;
  $restaurants = restaurant::find($Id);
  
// dd($phot_plats) ;
  return view('ProduitDetail',['plats' => $plats, 'phot_plats' => $phot_plats ,'menu_type_menus'=>$menu_type_menus ,'type_menus'=>$type_menus ,'menus'=>$menus,
    'restaurants'=>$restaurants , 
  'restaurant_menus'=>$restaurants_menu  ]);
  // return view('ProduitDetail') ;
}

 //Confirm compte 
 public function  confirm_coompte($verifi_code ,$Id_Agent  ){
      
 
  $agentr = agentr::where('id','=', $Id_Agent)
  ->where('verification_code','=',$verifi_code) ;

  if($agentr) {
      $agentr->update(['verification_code' =>null]) ;
      return  redirect('login/agentr')->with('success-agentr' ,'Compte activé veuillez vous connecter avec votre identifiant') ;
  }else{
return  redirect('login/agentr')->with('error' ,'lien  ce 
n\'pas valide') ;
  }

}
}
