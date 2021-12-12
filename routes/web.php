<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Events\Message ; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// Route::view('/', 'layouts.home');


Route::get('/',"RestoController@indexResto")->name('home') ;

Route::get('/maps',"MapsController@index")->name('index') ;


Route::get('/newResto',"RestoController@newResto");
Route::post('/register/agentr', [RegisterController::class,'storeAgent'])->name('welcome');

Route::get('/confirm/{Id_Agent}/{verifi_code}/',[RegisterController::class, 'confirm_coompte'])->name('confirm');
Route::group(['middleware' => 'auth:agentr'], function () {
    Route::view('/agentr', 'agentr');
    
Route::get('/agentr',"RestoController@ProfilAgentResto");


// Route::post('/store',"RestoController@storeAgent");

Route::POST('/storeplat',"RestoController@storeContenueMenu");
Route::POST('/storemenu',"RestoController@storemenu");
//Delete menu 
Route::POST('/deltemenu',"RestoController@DeleteMenu")->name('deletemenu');
//delete plat 
Route::POST('/deleteplat',"RestoController@DeletePlat")->name('deleteplat');


 Route::get('/agentr/{id}',"RestoController@UpdatePlat")->name('update.plat');

 Route::post('/update_Plat',"RestoController@store_plat_update")->name('store.plat.update');
 
Route::GET('/publierReso/{id}',"RestoController@publierReso");
});


Route::get('/marker', function(){
    return View::make('maps.map') ;
}) ;


Route::post('/marker', function(){
    restaurant::create(Input::all()) ;
    var_dump('restaurant add') ;
}) ;


Route::get('/marker', function(){
    return View::make('maps.map') ;
}) ;
Route::get('/serach', "RestoController@Search")->name('restaurant.cherche') ;
//  Auth::routes();

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    
    
    
    /**
    * Verification Routes
    */
    // Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    // Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    // Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
    
    
    
});
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/agentr', [LoginController::class,'showAgentLoginForm']);
Route::get('/login/client', [LoginController::class,'showClientLoginForm']);

Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/agentr', [RegisterController::class,'showAgentrRegisterForm']);
Route::get('/register/client', [RegisterController::class,'showClientRegisterForm']);


Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/agentr', [LoginController::class,'agentrLogin']);
Route::post('/login/client', [LoginController::class,'clientLogin']);

Route::post('/register/admin', [RegisterController::class,'createAdmin']);
// Route::post('/register/agentr', [RegisterController::class,'storeAgent'])->name('welcome');
Route::post('/register/client', [RegisterController::class,'createClient']);

// Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// // Password reset routes...
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
// Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');




Route::group(['middleware' => 'auth:client'], function () {
    Route::view('/client', 'client'); 

    Route::get('/client',"RestoController@ProfilClientResto");
    
//Cart Route 
Route::GET('/panier',"CartController@index")->name('cart.index');
Route::POST('/panier/ajouter',"CartController@store")->name('cart.store');
Route::POST('/panier/{rowI}',"CartController@storequantity")->name('cart.storequantite');

Route::patch('/panier/{rowId}',"CartController@update")->name('cart.update');

// Route::patch('update-cart', 'ProductController@updateCart');
Route::DELETE('/panier/{rowId}',"CartController@destroy")->name('cart.destroy');
Route::get('/videPanier', function(){
    Cart::destroy() ;
    return back()->with('success' , 'tout les produits sont supprimer .') ;
})->name('vide.panier');

    
//CheoutRoute
Route::get('/paiment' ,"PaimentController@index")->name('chekout.index') ;
Route::post('/paiment' ,"PaimentController@store")->name('chekout.store') ;

Route::get('/merci' ,"PaimentController@thankyou")->name('checkout.thankyou') ;


Route::get('/chat-ag-user',function(){
    return view('chats.chat') ;
    });
    Route::post('/send-message',"ChatController@store")->name('store.chat');

});

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'admin');
});

Route::get('logout', [LoginController::class,'logout']);



//modifier restau 

//Change photo 
Route::post('/changephoto' ,"RestoController@ChangePhoto")->name('change.photo') ;

// Route::GET('/panier/add',"CartController@add");
// Route::GET('/panier/index',"CartController@index");
 

// Route::GET('/infoPanier',"RestoController@infoPanier");


Route::GET('/visiterestau/{id}',"RestoController@findRestaurByClient")->name('visiterestau.index');
//Detail produits 
Route::get('/visiterestau/{id}/ProduitDetail/{rowId}',"RestoController@viewplatDetail")->name('view.plat') ;
Route::GET('/visiterestauTotal/{id}',"RestoController@visiterestauTotal")->name('visiterestautotal.index');

 



//Chat route 
// Route::get('/chat',"ChatController@index")->name('index.chat') ;
Route::resource('chat', ChatController::class) ;



// Route::get('/storePhot',"RestoController@ChangePhot")->name('Change.pho');

 //Route::post('change-profile-picture',[RestoController::class,'updatePicture'])->name('adminPictureUpdate');
 //Route::get('/change_profil_picture',"RestoController@ChangePhoto")->name('Change.photo');

 //Route::POST('/agentr/{rowI}',"RestoController@ChangePhoto")->name('cart.storequantite');

