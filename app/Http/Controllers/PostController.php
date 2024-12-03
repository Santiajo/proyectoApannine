<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function sidebar()
    {
        return view('posts.sidebar');
    }
    public function show($post)
    {
        return view('posts.show', compact('post'));
    }
    
    // VIEWS DEL BENEFICIARIO
    public function fichabeneficiario()
    {
        return view('views.beneficiario.fichabeneficiario'); 
    }

    public function formularioBeneficiario()
    {
        return view('views.beneficiario.formularioBeneficiario'); 
    }

    public function verBeneficiario()
    {
        return view('views.beneficiario.verBeneficiario'); 
    }

    public function exportarBeneficiario()
    {
        return view('views.beneficiario.exportarBeneficiario'); 
    }

    public function beneficiarioAsistencia()
    {
        return view('views.beneficiario.beneficiarioAsistencia'); 
    }

    public function registroAsistBeneficiario()
    {
        return view('views.beneficiario.registroAsistBeneficiario'); 
    }

    public function actividadBeneficiario()
    {
        return view('views.beneficiario.actividadBeneficiario'); 
    }

    public function histMedBeneficiario()
    {
        return view('views.beneficiario.histMedBeneficiario'); 
    }

    // VIEWS DE ASISTENCIA
    public function asistencia()
    {
        return view('views.asistencia.asistencia'); 
    }

    public function registroactividad()
    {
        return view('views.asistencia.registroactividad'); 
    }

    public function asistenciaBeneficiarios()
    {
        return view('views.asistencia.asistenciaBeneficiarios'); 
    }

    public function buscarBeneficiario()
    {
        return view('views.asistencia.buscarBeneficiario'); 
    }

    public function asistenciaTallerYoga()
    {
        return view('views.asistencia.asistenciaTallerYoga'); 
    }

    public function especialistas()
    {
        return view('views.asistencia.especialistas'); 
    }

    public function dia()
    {
        return view('views.asistencia.dia'); 
    }

    public function registrofecha()
    {
        return view('views.asistencia.registrofecha'); 
    }

    public function yogaTodos()
    {
        return view('views.asistencia.yogaTodos'); 
    }
    public function yogaDia()
    {
        return view('views.asistencia.yogaDia'); 
    }

    public function exportarAsistencia()
    {
        return view('views.asistencia.exportarAsistencia'); 
    }

    // VIEWS DE ESPECIALISTAS
    public function fichaespecialista()
    {
        return view('views.especialistas.fichaespecialista'); 
    }

    public function formEspecialidad()
    {
        return view('views.especialistas.formEspecialidad'); 
    }

    public function formEspecialista()
    {
        return view('views.especialistas.formEspecialista'); 
    }

    public function exportarEspecialistas()
    {
        return view('views.especialistas.exportarEspecialistas'); 
    }

    // VIEWS DE CRUD USUARIOS
    public function fichausuarios()
    {
        return view('views.usuarios.fichausuarios'); 
    }

    public function formulariousuario()
    {
        return view('views.usuarios.formulariousuario'); 
    }

    public function vistaUsuario()
    {
        return view('views.usuarios.vistaUsuario'); 
    }

    public function exportarUsuarios()
    {
        return view('views.usuarios.exportarUsuarios'); 
    }

    
}
