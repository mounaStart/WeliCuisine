<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Agentr;
use App\Client;


use App\Models\eleve;

use App\Models\type_menu;
use App\Models\menu_type_menu;
use App\Models\menu;
use App\Models\restaurant_menu;
use App\Models\plat;
use App\Models\restaurant;
use App\Models\addresse;
use App\Models\phot_plat;
use App\Http\Controllers\MailController  ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

USE Illuminate\Support\Str ;
use Illuminate\Auth\Events\Registered;


use  App\Mail\AgentrMailable ;

use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:agentr');
        $this->middleware('guest:client');
      
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect('/login')->with('success' , "votre compte à éte bien créer pour le confirmer clicker sur 
        l\'emal que vous avez reçu") ;
        // return $request->wantsJson()? new JsonResponse([], 201)
        //             : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
  

  
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function validatorClient(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'Prenom_Client' => 'required|string|max:255',
            'Num_Tel' => 'required|Integer|max:255',
            'Sexe' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAgentrRegisterForm()
    {
        return view('auth.register', ['url' => 'agentr']);
    }
    public function showClientRegisterForm()
    {
        return view('auth.register', ['url' => 'client']);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code' => bcrypt(str::random(16))
        ]);

        if($agentrs != null){

            Mail::to($agentrs->email)->send(new SignupEmail($agentrs));
            // MailController::) ;
                  return redirect()->back()->with(session()->flash('alert-success' ,'email envoyer ')); 
        }
        // $agentrs->save() ;
        return redirect()->back()->with(session()->flash('alert-dang' ,'email envoyer '));  
 
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function validatorAgent(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'Num_Tel'=> 'required | min:6 |unique:agentrs'
        ]);
    }
     //placeholderemail
     public function placeAgentrMailable($request){
        $agentr_data = [
          'email' => $request->input('email') ,
          'password' => $request->input('password') ,
           'name'=> $request->input('nom') ,
           'url'=> $request->verification_code ,
        ] ;

        $to_customer_email = $request->input('email') ;
        Mail::to($to_customer_email)->send(new AgentrMailable($agentr_data));
       
      
      }
      //Confirm compte 
      public function  confirm_coompte($Id_Agent ,$verifi_code ){
      
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
    public function storeAgent(Request $request )
    {
        $agentrs = new agentr() ;
        $agentrs->Num_Agent=  3;
        $agentrs->name= $request->input('nom') ;
        $agentrs->Prenom_AgentR= $request->input('prenom') ;
        $agentrs->email= $request->input('email') ;
        $agentrs->password=  Hash::make($request->password) ;
        $agentrs->Num_Tel= $request->input('phone') ;
        $agentrs->Sexe= $request->input('sexe') ;
        $agentrs->verification_code = Str::random(16).''.rand( 10000, 99999 ) ;
        $agentrs->save() ;

         $restaurants =new  restaurant() ;
        $restaurants->Nom_Restau= $request->input('nomR') ;
        $restaurants->Id_AgentR= $agentrs->id ;
       
        $restaurants->save() ;

         $addresses = new addresse() ;
        $addresses->ville= $request->input('addresse') ;
        $addresses->Id_Restaurant = $restaurants->Id_Restau ;
        $addresses->save() ;

        $agentr_data = [
            'email' => $request->input('email') ,
            'password' => $request->input('password') ,
             'name'=> $request->input('nom') ,
             'verifi_code'=>  $agentrs->verification_code  ,
             'agentr_id'=>  $agentrs->id  ,
          ] ;
         
          $to_customer_email = $request->input('email') ;
          Mail::to($to_customer_email)->send(new AgentrMailable($agentr_data));
       
          return redirect('login/agentr')->with(session()->flash('success' ,"votre compte à été bien créer pour le confirmer clicker sur 
          l\'emal que vous avez reçu" )); 
    
          
       

        // $restaurants =new  restaurant() ;
        // $restaurants->Nom_Restau= $request->input('nomR') ;
        // $restaurants->Id_AgentR= $agentrs->id ;
       
        // $restaurants->save() ;
        
        // $addresses = new addresse() ;
        // $addresses->ville= $request->input('addresse') ;
        // $addresses->Id_Restaurant = $restaurants->Id_Restau ;
        // $addresses->save() ;

        // $this->placeAgentrMailable($request) ;
        // return redirect('login/agentr')->with(session()->flash('success' ,"votre compte à été bien créer pour le confirmer clicker sur 
        // l\'emal que vous avez reçu" )); 

    //     $agentrs = new agentr() ;
    //     $agentrs->Num_Agent=  3;
    //     $agentrs->name= $request->input('name');
    //     $agentrs->Prenom_AgentR= "zzz" ;
    //     $agentrs->email= $request->input('email') ;
    //    $agentrs->verification_code = sha1(time()) ;
    //     $agentrs->password= Hash::make($request->password);
    //     $agentrs->Num_Tel= 22322 ;
    //     $agentrs->Sexe= "dfdfd";
        

        // if($user != null){
        //     MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
        //     return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
        // }

        // return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
   
        // if($agentrs != null){

        //     Mail::to($agentrs->email)->send(new SignupEmail($agentrs));
        //     // MailController::) ;
        //           return redirect()->back()->with(session()->flash('alert-success' ,'email envoyer ')); 
        // }
        // $agentrs->save() ;
        // return redirect()->back()->with(session()->flash('alert-dang' ,'email envoyer '));  
    }

 
    protected function createAgentr(Request $request)
    {
        $this->validator($request->all())->validate();
        Agentr::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/agentr');
    }
    protected function createClient(Request $request)
    {
        $this-> validatorClient($request->all())->validate();
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/client');
    }
    

    
}