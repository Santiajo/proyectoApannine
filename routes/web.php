<?php

//GET peticiones visibles
//Post peticiones de informacion no visible
//Put actualizar algun registro
//Patch
//Delete eliminar registro

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Aqui se llama a las rutas
Route::get('/', [HomeController::class, 'index']);

Route::get('/login/login', [PostController::class, 'login']);

Route::get('/posts/sidebar', [PostController::class, 'sidebar']);

Route::get('/posts/{post}', [PostController::class, 'show']);


// RUTAS DE BENEFICIARIO
Route::get('/views/fichabeneficiario', [PostController::class, 'fichabeneficiario'])->name('fichabeneficiario');
Route::get('/views/formularioBeneficiario', [PostController::class, 'formularioBeneficiario'])->name('formularioBeneficiario');
Route::get('/views/verBeneficiario', [PostController::class, 'verBeneficiario'])->name('verBeneficiario');

// RUTAS DE ASISTENCIA
Route::get('/views/asistencia', [PostController::class, 'asistencia'])->name('asistencia');
Route::get('/views/registroactividad', [PostController::class, 'registroactividad'])->name('registroactividad');
Route::get('/views/asistenciaTallerYoga', [PostController::class, 'asistenciaTallerYoga'])->name('asistenciaTallerYoga');
Route::get('/views/asistenciaBeneficiarios', [PostController::class, 'asistenciaBeneficiarios'])->name('asistenciaBeneficiarios');
Route::get('/views/buscarBeneficiario', [PostController::class, 'buscarBeneficiario'])->name('buscarBeneficiario');
Route::get('/views/especialistas', [PostController::class, 'especialistas'])->name('especialistas');
Route::get('/views/dia', [PostController::class, 'dia'])->name('dia');
Route::get('/views/registrofecha', [PostController::class, 'registrofecha'])->name('registrofecha');
Route::get('/views/yogaDia', [PostController::class, 'yogaDia'])->name('yogaDia');
Route::get('/views/yogaTodos', [PostController::class, 'yogaTodos'])->name('yogaTodos');

// RUTAS ESPECIALISTAS
Route::get('/views/fichaespecialista', [PostController::class, 'fichaespecialista'])->name('fichaespecialista');
Route::get('/views/formEspecialidad', [PostController::class, 'formEspecialidad'])->name('formEspecialidad');
Route::get('/views/formEspecialista', [PostController::class, 'formEspecialista'])->name('formEspecialista');

// RUTAS DEL CRUD PARA EL LOGIN
Route::get('/views/fichausuarios', [PostController::class, 'fichausuarios'])->name('fichausuarios');
Route::get('/views/formulariousuario', [PostController::class, 'formulariousuario'])->name('formulariousuario');
Route::get('/views/vistaUsuario', [PostController::class, 'vistaUsuario'])->name('vistaUsuario');
