<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\cursosController;
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
//rutas de prueba
// route :: get('/user/pruebas',[userController::class,'pruebas']);
route :: get('/category/all',[categoryController::class,'allCtaegoryParent']);
// route :: get('/post/pruebas',[postController::class,'pruebas']);

//rutas del controlador de usuarios
//----------------------------------------------------------------------------------
route::resource('/api/user',userController::class);

//vamos a definir una rota resource para el controlador de categorias
route::resource('/api/category',categoryController::class);
//vamos a definir una rota resource para el controlador de cursos
route::resource('/api/cursos',cursosController::class);

Route::get('/api/cursos/category/{id}',[cursosController::class,'getCursoByCategory']);