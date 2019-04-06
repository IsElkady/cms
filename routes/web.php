<?php

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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/getusers",function(){

   $roles= Role::find(1);

   foreach($roles->users as $user)
   {
       echo $user->name;
   }

});

Route::get("/getroles",function(){

    $user=User::find(1);
//    echo "<pre>";
//    print_r($user);
//    echo "</pre>";
    print_r($user->Roles()->name);
    //foreach($user->Roles() as $role)
    //   echo $role->name;
    //echo $user->Roles()->name;
});

Route::get("/admin",function(){

    return view("admin.index");

});
Route::group(['middleware'=>'admin'],function(){
    Route::resource("/admin/users","AdminUsersController");

});
