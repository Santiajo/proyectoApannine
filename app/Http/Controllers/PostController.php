<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function login()
    // {
    //     return view('login.login');
    // }
    public function sidebar()
    {
        return view('posts.sidebar');
    }
    public function show($post)
    {
        return view('posts.show', compact('post'));
    }

    // RESTO DE LA VIEW DE BENEFICIARIO
    public function beneficiarioAsistencia()
    {
        return view('beneficiario.beneficiarioAsistencia'); 
    }

    public function registroAsistBeneficiario()
    {
        return view('beneficiario.registroAsistBeneficiario'); 
    }

    public function actividadBeneficiario()
    {
        return view('beneficiario.actividadBeneficiario'); 
    }

    // HISTORIAL MÉDICO DEL BENEFICIARIO
    public function histMedBeneficiario()
    {
        return view('beneficiario.histMedico.histMedBeneficiario'); 
    }

    public function antMedBeneficiario()
    {
        return view('beneficiario..histMedico.antMedBeneficiario'); 
    }

    public function diagnosticoBeneficiario()
    {
        return view('beneficiario..histMedico.diagnosticoBeneficiario'); 
    }

    public function documentosBeneficiario()
    {
        return view('beneficiario..histMedico.documentosBeneficiario'); 
    }


    public function detallesAsistencia()
    {
        return view('beneficiario.detallesAsistencia');
    }

    public function detallesAusencia()
    {
        return view('beneficiario.detallesAusencia');
    }

    public function exportarAsistenciaBen()
    {
        return view('beneficiario.exportarAsistenciaBen');
    }

    // VIEWS PARA EL HORARIO DEL BENEFICIARIO
    public function horarioBeneficiario()
    {
        return view('beneficiario.horario.horarioBeneficiario');
    }

    public function formularioHorario()
    {
        return view('beneficiario.horario.formularioHorario');
    }

    public function histMedicoVerHorario() {
        return view('beneficiario.horario.verHorario');
    }

    public function histMedicoVerCambios() {
        return view('beneficiario.horario.verCambios');
    }

    // VIEWS DE ASISTENCIA
    public function asistencia()
    {
        return view('asistencia.asistencia'); 
    }

    public function registroactividad()
    {
        return view('asistencia.registroactividad'); 
    }

    public function asistenciaBeneficiarios()
    {
        return view('asistencia.asistenciaBeneficiarios'); 
    }

    public function buscarBeneficiario()
    {
        return view('asistencia.buscarBeneficiario'); 
    }

    public function asistenciaTallerYoga()
    {
        return view('asistencia.asistenciaTallerYoga'); 
    }

    public function especialistas()
    {
        return view('asistencia.especialistas'); 
    }

    public function dia()
    {
        return view('asistencia.dia'); 
    }

    public function registrofecha()
    {
        return view('asistencia.registrofecha'); 
    }

    public function yogaTodos()
    {
        return view('asistencia.yogaTodos'); 
    }
    public function yogaDia()
    {
        return view('asistencia.yogaDia'); 
    }

    public function exportarAsistencia()
    {
        return view('asistencia.exportarAsistencia'); 
    }

    // VIEWS DE ESPECIALISTAS

    public function exportarEspecialistas()
    {
        return view('especialistas.exportarEspecialistas'); 
    }

    // VIEWS DE CRUD USUARIOS
    // public function fichausuarios()
    // {
    //     return view('usuarios.fichausuarios'); 
    // }

    // public function formulariousuario()
    // {
    //     return view('usuarios.formulariousuario'); 
    // }

    // public function vistaUsuario()
    // {
    //     return view('usuarios.vistaUsuario'); 
    // }

    // public function exportarUsuarios()
    // {
    //     return view('usuarios.exportarUsuarios'); 
    // }

    // VIEWS PARA REGISTRO DE ASISTENCIA DEL MEDICO
    public function asistenciasEspecialistas() {
        return view('beneficiarioAsistencia.asistenciasEspecialista');
    }

    public function formAsistenciaMedico() {
        return view('beneficiarioAsistencia.formAsistenciaMedico');
    }
}
