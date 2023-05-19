<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::any('/product',function(){
//     dd("called");
// });

// Route::view('/product','listallproducts');
Route::view('/addnewpro','addnewpro');

Route::post('/saveproduct',[App\http\controllers\ProductTableController::class, 'store']);

Route::get('/product',[App\http\controllers\ProductTableController::class, 'index']);

// Route::get('/product',[App\Http\Controllers\ProductTableController::class, 'create']);

// Route::post('/saveproduct',[App\http\controllers\product::class, 'index']);
// Route::get('/delatepro/{id}',[App\http\controllers\ProductTableController::class, 'destroy']);
Route::get('/editpro/{id}',[App\http\controllers\ProductTableController::class, 'edit']);
Route::post('/updatepro/{id}',[App\http\controllers\ProductTableController::class, 'update']);
Route::get('/delatepro/{id}',[App\http\controllers\ProductTableController::class, 'destroy']);






Route::any('/eloqrele',[App\http\controllers\commentController::class, 'index']);

Route::any('/admindashboard',[App\http\controllers\Admincontroller::class, 'index']);
Route::any('/allproducts',[App\http\controllers\Admincontroller::class, 'products']);
// Route::any('/testTrait',[App\http\controllers\ProductTableController::class, 'testTrait']);


Route::view('/Ajax','ajaxview');
Route::view('/uploadimageajax','uploadimage');

Route::view('/viewmacro','viewmacro');



// Route::get('send-mail', function () {

//     $details = [
//         'title' => 'Mail from yashsinh ',
//         'body' => 'This is for testing email using smtp'
//     ];

//    \Mail::to('dodiyay098@gmail.com')->send(new \App\Mail\MyTestMail($details));
//     dd("Email send successfully.");
// });
Route::get('send-mail', [App\http\controllers\ProductTableController::class, 'sendmail']);



// Route::view('/Ajax',[App\http\controllers\Admincontroller::class, 'productsdataapiget']);


// Route::middleware('auth')->group(function () {
// Route::any('/admindashboard',[App\http\controllers\admincontroller::class, 'index']);
// });

// Route::any('/admindashboard',function(){
//         dd("admindashboard called");
//     });


// Route::get('/uri',[Controller::class, 'method']);  //get data from server and show
// in blade page

// Route::post('/uri',[Controller::class, 'method']);  //send Html data to the server

// Route::patch('/uri/{id}',[contoller::class, 'method']); //Get data with id select for
// update

// Route::put('/uri/{id}',[controller::class, 'method']); //submit data with id for 
// update

// Route::delate('/uri/{id}',[controller::class, 'method']); //delate data with id

// Route::any('/uri/?{id}',[controller::class, 'method']); //all method except view 
// reource

// Route::view('/uri',"viewname"); //direct view page load

// Route::Reource('/uri',controller::class); //all routes maintain by view

require __DIR__.'/auth.php';
