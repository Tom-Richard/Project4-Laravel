<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\Pizza\PizzaIngredientController;
use App\Models\User;
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
    return view('startpagina');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/resetpassword/{id}', [AdminController::class, 'resetpassword'])->name('admin.resetpassword');
    Route::put('/admin/updatepassword/{id}', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
    Route::resource('pizza',PizzaController::class)->middleware('auth'); //Log eerst in voordat je het menu bekijkt.
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('order', CustomerController::class);

    Route::post('/pizza/{pizza_id}/ingredient', [PizzaIngredientController::class, 'store'])->middleware(['auth'])->name('pizzaingredient.store');
    Route::delete('/pizza/{pizza_id}/ingredient/{ingredient_id}', [PizzaIngredientController::class, 'destroy'])->middleware(['auth'])->name('pizzaingredient.destroy');});

    Route::get('/cart/', [\App\Http\Controllers\CartController::class, 'index'])->middleware(['auth'])->name('cart.index');
    Route::post('/cart/pizza/{pizza_id}', [\App\Http\Controllers\Cart\CartPizzaController::class, 'store'])->middleware(['auth'])->name('cartpizza.store');
    Route::delete('/cart/pizza/{pizza_id}', [\App\Http\Controllers\Cart\CartPizzaController::class, 'destroy'])->middleware(['auth'])->name('cartpizza.destroy');


require __DIR__.'/auth.php';
