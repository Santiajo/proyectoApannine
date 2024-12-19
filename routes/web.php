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
Route::get('/', [PostController::class, 'login']);

Route::get('/login/login', [PostController::class, 'login']);

Route::get('/posts/sidebar', [PostController::class, 'sidebar']);

Route::get('/posts/{post}', [PostController::class, 'show']);


// RUTAS DE BENEFICIARIO
    
    // FORMULARIO DEL BENEFICIARIO
    Route::get('/views/formBeneficiario', [PostController::class, 'formularioBeneficiario'])->name('formularioBeneficiario');
    Route::get('/views/formularioBeneficiarioColegio', [PostController::class, 'formularioBeneficiarioColegio'])->name('formularioBeneficiarioColegio');
    Route::get('/views/formularioBeneficiarioDerivante', [PostController::class, 'formularioBeneficiarioDerivante'])->name('formularioBeneficiarioDerivante');
    Route::get('/views/formularioBeneficiarioFamilia', [PostController::class, 'formularioBeneficiarioFamilia'])->name('formularioBeneficiarioFamilia');
    Route::get('/views/formularioBeneficiarioAntSocial', [PostController::class, 'formularioBeneficiarioAntSocial'])->name('formularioBeneficiarioAntSocial');
    Route::get('/views/formularioBeneficiarioAntSalud', [PostController::class, 'formularioBeneficiarioAntSalud'])->name('formularioBeneficiarioAntSalud');
    Route::get('/views/formularioBeneficiarioDiagnostico', [PostController::class, 'formularioBeneficiarioDiagnostico'])->name('formularioBeneficiarioDiagnostico');
    
    // HISTORIAL MÉDICO DEL BENEFICIARIO
    Route::get('/views/histMedBeneficiario', [PostController::class, 'histMedBeneficiario'])->name('histMedBeneficiario');
    Route::get('/views/antMedBeneficiario', [PostController::class, 'antMedBeneficiario'])->name('antMedBeneficiario');
    Route::get('/views/diagnosticoBeneficiario', [PostController::class, 'diagnosticoBeneficiario'])->name('diagnosticoBeneficiario');
    Route::get('/views/documentosBeneficiario', [PostController::class, 'documentosBeneficiario'])->name('documentosBeneficiario');

    // HORARIO DEL BENEFICIARIO
    Route::get('/views/horarioBeneficiario', [PostController::class, 'horarioBeneficiario'])->name('horarioBeneficiario');
    Route::get('/views/formularioHorario', [PostController::class, 'formularioHorario'])->name('formularioHorario');

Route::get('/views/verBeneficiario', [PostController::class, 'verBeneficiario'])->name('verBeneficiario');
Route::get('/views/exportarBeneficiario', [PostController::class, 'exportarBeneficiario'])->name('exportarBeneficiario');
Route::get('/views/beneficiarioAsistencia', [PostController::class, 'beneficiarioAsistencia'])->name('beneficiarioAsistencia');
Route::get('/views/registroAsistBeneficiario', [PostController::class, 'registroAsistBeneficiario'])->name('registroAsistBeneficiario');
Route::get('/views/actividadBeneficiario', [PostController::class, 'actividadBeneficiario'])->name('actividadBeneficiario');
Route::get('/views/detallesAsistencia', [PostController::class, 'detallesAsistencia'])->name('detallesAsistencia');
Route::get('/views/detallesAusencia', [PostController::class, 'detallesAusencia'])->name('detallesAusencia');
Route::get('/views/exportarAsistenciaBen', [PostController::class, 'exportarAsistenciaBen'])->name('exportarAsistenciaBen');
Route::get('/views/fichabeneficiario', [PostController::class, 'fichabeneficiario'])->name('fichabeneficiario');

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
Route::get('/views/exportarAsistencia', [PostController::class, 'exportarAsistencia'])->name('exportarAsistencia');

// RUTAS ESPECIALISTAS
Route::get('/views/fichaespecialista', [PostController::class, 'fichaespecialista'])->name('fichaespecialista');
Route::get('/views/formEspecialidad', [PostController::class, 'formEspecialidad'])->name('formEspecialidad');
Route::get('/views/formEspecialista', [PostController::class, 'formEspecialista'])->name('formEspecialista');
Route::get('/views/exportarEspecialistas', [PostController::class, 'exportarEspecialistas'])->name('exportarEspecialistas');

// RUTAS DEL CRUD PARA EL LOGIN
Route::get('/views/fichausuarios', [PostController::class, 'fichausuarios'])->name('fichausuarios');
Route::get('/views/formulariousuario', [PostController::class, 'formulariousuario'])->name('formulariousuario');
Route::get('/views/vistaUsuario', [PostController::class, 'vistaUsuario'])->name('vistaUsuario');
Route::get('/views/exportarUsuarios', [PostController::class, 'exportarUsuarios'])->name('exportarUsuarios');
Route::get('/views/exportarUsuarios', [PostController::class, 'exportarUsuarios'])->name('exportarUsuarios');

// RUTAS PARA ASISTENCIAS DESDE POV DEL MEDICO
Route::get('/views/asistenciasEspecialistas', [PostController::class, 'asistenciasEspecialistas'])->name('asistenciasEspecialistas');
Route::get('/views/formAsistenciaMedico', [PostController::class, 'formAsistenciaMedico'])->name('formAsistenciaMedico');
