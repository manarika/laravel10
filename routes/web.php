<?php

use App\Http\Controllers\TicketController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\AvatarController;
use OpenAI\Laravel\Facades\OpenAI;

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
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::post('/profile/avatar/AI', [AvatarController::class, 'generate'])->name('profile.avatar.name');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Route::get('/openai',function (){
//
//$result = OpenAI::images()->create([
//    "prompt"=> "create avatar for a female developer 20 years old moroccan called manar",
//    "n"=> 1,
//    "size"=> "512x512",
//]);
//
//    return response(['url' => $result->data[0]->url]); // an open-source, widely-used, server-side scripting language.
//
//// an open-source, widely-used, server-side scripting language.
//});

Route::post('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    $user=User::firstOrCreate(['email'=>$user->email],[
        'name'=>$user->nickname,
        'password'=>'password',
    ]);
    Auth::login($user);
    return redirect('/dashboard');


    // $user->token
});

    Route::middleware('auth')->group(function (){
    Route::resource('/ticket',TicketController::class);

//    Route::post('/ticket/create',[TicketController::class,'store'])->name('ticket.store');

});

