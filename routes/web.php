<?php

use Illuminate\Support\Facades\Route;
// CONTROLADOR GENERAL PARA COSAS NO CRAFTEADAS
use App\Http\Controllers\PostController;
// CONTROLADOR ESPECIALIDADES
use App\Http\Controllers\especialidadController;
// CONTROLADOR ESPECIALISTAS
use App\Http\Controllers\especialistaController;
// CONTROLADOR DE BENEFICIARIOS
use App\Http\Controllers\beneficiarioController;
// CONTROLADOR DE NACIONALIDADES
use App\Http\Controllers\nacionalidadController;
// CONTROLADOR DE COBERTURAS MEDICAS
use App\Http\Controllers\cobMedController;
// CONTROLADOR DE COMUNAS
use App\Http\Controllers\comunaController;

//Aqui se llama a las rutas
Route::get('/', [PostController::class, 'login']);
Route::get('/login/login', [PostController::class, 'login']);
Route::get('/posts/sidebar', [PostController::class, 'sidebar']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// NACIONALIDADES DE LOS BENEFICIARIOS
//  PARA MOSTRAR EL CRUD NACIONALIDADES
Route::get('/views/crudNacionalidad', [nacionalidadController::class, 'crudNacionalidad'])->name('beneficiarios.crudNacionalidad');
// PARA CREAR O ACTUALIZAR COBERTURAS
Route::post('/views/guardarNacionalidad', [nacionalidadController::class, 'guardarNacionalidad'])->name('beneficiarios.guardarNacionalidad');
// PARA ELIMINAR COBERTURA
Route::delete('/views/eliminarNacionalidad/{id}', [nacionalidadController::class, 'eliminarNacionalidad'])->name('beneficiarios.eliminarNacionalidad');

// COBERTURAS MEDICAS DE LOS BENEFICIARIOS
//  PARA MOSTRAR EL CRUD COMUNAS
Route::get('/views/crudComuna', [comunaController::class, 'crudComuna'])->name('beneficiarios.crudComuna');
// PARA CREAR O ACTUALIZAR COBERTURAS
Route::post('/views/guardarComuna', [comunaController::class, 'guardarComuna'])->name('beneficiarios.guardarComuna');
// PARA ELIMINAR COBERTURA
Route::delete('/views/eliminarComuna/{id}', [comunaController::class, 'eliminarComuna'])->name('beneficiarios.eliminarComuna');

// COMUNAS DE LOS BENEFICIARIOS
//  PARA MOSTRAR EL CRUD DE COBERTURAS MEDICAS
Route::get('/views/crudCobMedica', [cobMedController::class, 'crudCobMedica'])->name('beneficiarios.crudCobMedica');
// PARA CREAR O ACTUALIZAR COBERTURAS
Route::post('/views/guardarCobMedica', [cobMedController::class, 'guardarCobMedica'])->name('beneficiarios.guardarCobMedica');
// PARA ELIMINAR COBERTURA
Route::delete('/views/eliminarCobMedica/{id}', [cobMedController::class, 'eliminarCobMedica'])->name('beneficiarios.eliminarCobMedica');

// RUTAS DE BENEFICIARIO
// PAGINA PRINCIPAL DE LOS CRUD BENEFICIARIOS
Route::get('/views/listarBeneficiarios', [beneficiarioController::class, 'listarBeneficiarios'])->name('beneficiarios.listarBeneficiarios');

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
Route::get('/views/histMedicoVerHorario', [PostController::class, 'histMedicoVerHorario'])->name('histMedicoVerHorario');
Route::get('/views/histMedicoVerCambios', [PostController::class, 'histMedicoVerCambios'])->name('histMedicoVerCambios');

Route::get('/views/verBeneficiario', [PostController::class, 'verBeneficiario'])->name('verBeneficiario');
Route::get('/views/exportarBeneficiario', [PostController::class, 'exportarBeneficiario'])->name('exportarBeneficiario');
Route::get('/views/beneficiarioAsistencia', [PostController::class, 'beneficiarioAsistencia'])->name('beneficiarioAsistencia');
Route::get('/views/registroAsistBeneficiario', [PostController::class, 'registroAsistBeneficiario'])->name('registroAsistBeneficiario');
Route::get('/views/actividadBeneficiario', [PostController::class, 'actividadBeneficiario'])->name('actividadBeneficiario');
Route::get('/views/detallesAsistencia', [PostController::class, 'detallesAsistencia'])->name('detallesAsistencia');
Route::get('/views/detallesAusencia', [PostController::class, 'detallesAusencia'])->name('detallesAusencia');
Route::get('/views/exportarAsistenciaBen', [PostController::class, 'exportarAsistenciaBen'])->name('exportarAsistenciaBen');


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

// RUTAS DEL CRUD DE ESPECIALIDADES
// PARA MOSTRAR LA PÁGINA DEL CRUD DE ESPECIALIDADES
Route::get('/views/crudEspecialidad', [especialidadController::class, 'crudEspecialidad'])->name('especialistas.crudEspecialidad');
// PARA GUARDAR O ACTUALIZAR UNA ESPECIALIDAD
Route::post('/views/guardarEspecialidad', [especialidadController::class, 'guardarEspecialidad'])->name('especialistas.guardarEspecialidad');
// PARA ELIMINAR UNA ESPECIALIDAD
Route::delete('/views/eliminarEspecialidad/{id}', [especialidadController::class, 'eliminarEspecialidad'])->name('especialistas.eliminarEspecialidad');

// RUTAS DEL CRUD DE ESPECIALISTAS
// PARA MOSTRAR LA PÁGINA PRINCIPAL DEL CRUD
Route::get('/views/listarEspecialistas', [especialistaController::class, 'listarEspecialistas'])->name('especialistas.listarEspecialistas');
// PARA MOSTRAR EL FORMULARIO DE CREACIÓN DE ESPECIALISTA
Route::get('/views/formularioEspecialista', [especialistaController::class, 'formularioEspecialista'])->name('especialistas.formularioEspecialista');
// PARA MOSTRAR EL FORMULARIO DE CREACIÓN DE ESPECIALISTA RELLENO
Route::get('/views/formularioEspecialistaRelleno/{id}', [especialistaController::class, 'formularioEspecialistaRelleno'])->name('especialistas.formularioEspecialistaRelleno');
//EXCEL
Route::get('/views/exportarEspecialistas', [especialistaController::class, 'exportarEspecialistas'])->name('especialistas.exportarEspecialistas');
// PARA GUARDAR O ACTUALIZAR UN ESPECIALISTA
Route::post('/views/guardarEspecialista', [especialistaController::class, 'guardarEspecialista'])->name('especialistas.guardarEspecialista');
// PARA ELIMINAR UN ESPECIALISTA
Route::delete('/views/eliminarEspecialista/{id}', [especialistaController::class, 'eliminarEspecialista'])->name('especialistas.eliminarEspecialista');

// RUTAS DEL CRUD PARA EL LOGIN
Route::get('/views/fichausuarios', [PostController::class, 'fichausuarios'])->name('fichausuarios');
Route::get('/views/formulariousuario', [PostController::class, 'formulariousuario'])->name('formulariousuario');
Route::get('/views/vistaUsuario', [PostController::class, 'vistaUsuario'])->name('vistaUsuario');
Route::get('/views/exportarUsuarios', [PostController::class, 'exportarUsuarios'])->name('exportarUsuarios');
Route::get('/views/exportarUsuarios', [PostController::class, 'exportarUsuarios'])->name('exportarUsuarios');

// RUTAS PARA ASISTENCIAS DESDE POV DEL MEDICO
Route::get('/views/asistenciasEspecialistas', [PostController::class, 'asistenciasEspecialistas'])->name('asistenciasEspecialistas');
Route::get('/views/formAsistenciaMedico', [PostController::class, 'formAsistenciaMedico'])->name('formAsistenciaMedico');

