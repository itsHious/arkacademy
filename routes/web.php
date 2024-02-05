<?php

use App\Http\Controllers\TeamController;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::group(['middleware' => ['auth']], function ()
{
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('home');
    
    Route::get('dashboard',[TeamController::class,'home'])->name('dashboard');

    Route::post('add-team',[TeamController::class,'store'])->name('add.team');

    Route::get('team/{id}',[TeamController::class,'viewteam'])->name('team.view');
    Route::post('add-team-member/{id}',[TeamController::class,'addmember'])->name('add.team.member');
    Route::get('view/team/{id}/member',[TeamController::class,'viewmember'])->name('team.view.member');
    Route::get('edit/{id}/member',[TeamController::class,'editmember'])->name('team.edit.member');
    Route::post('update/{id}/member',[TeamController::class,'updatemember'])->name('update.team.member');
    Route::get('delete/{id}/member',[TeamController::class,'deletemember'])->name('team.delete.member');
    Route::get('edit/{id}/team',[TeamController::class,'editteam'])->name('team.edit');
    Route::post('update/{id}/team',[TeamController::class,'updateteam'])->name('update.team');
    Route::get('delete/{id}/team',[TeamController::class,'deleteteam'])->name('team.delete');
});

require __DIR__.'/auth.php';
