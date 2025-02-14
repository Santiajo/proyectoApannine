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

    // FORMULARIO PARA EL BENEFICIARIO
    public function formularioBeneficiario()
    {
        return view('views.beneficiario.formulario.formularioBeneficiario'); 
    }

    public function formularioBeneficiarioColegio()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioColegio'); 
    }

    public function formularioBeneficiarioDerivante()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioDerivante'); 
    }

    public function formularioBeneficiarioFamilia()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioFamilia'); 
    }

    public function formularioBeneficiarioAntSalud()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioAntSalud'); 
    }

    public function formularioBeneficiarioAntSocial()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioAntSocial'); 
    }

    public function formularioBeneficiarioDiagnostico()
    {
        return view('views.beneficiario.formulario.formularioBeneficiarioDiagnostico'); 
    }

    // RESTO DE LA VIEW DE BENEFICIARIO
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

    // HISTORIAL MÉDICO DEL BENEFICIARIO
    public function histMedBeneficiario()
    {
        return view('views.beneficiario.histMedico.histMedBeneficiario'); 
    }

    public function antMedBeneficiario()
    {
        return view('views.beneficiario..histMedico.antMedBeneficiario'); 
    }

    public function diagnosticoBeneficiario()
    {
        return view('views.beneficiario..histMedico.diagnosticoBeneficiario'); 
    }

    public function documentosBeneficiario()
    {
        return view('views.beneficiario..histMedico.documentosBeneficiario'); 
    }


    public function detallesAsistencia()
    {
        return view('views.beneficiario.detallesAsistencia');
    }

    public function detallesAusencia()
    {
        return view('views.beneficiario.detallesAusencia');
    }

    public function exportarAsistenciaBen()
    {
        return view('views.beneficiario.exportarAsistenciaBen');
    }

    // VIEWS PARA EL HORARIO DEL BENEFICIARIO
    public function horarioBeneficiario()
    {
        return view('views.beneficiario.horario.horarioBeneficiario');
    }

    public function formularioHorario()
    {
        return view('views.beneficiario.horario.formularioHorario');
    }

    public function histMedicoVerHorario() {
        return view('views.beneficiario.horario.verHorario');
    }

    public function histMedicoVerCambios() {
        return view('views.beneficiario.horario.verCambios');
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

    // VIEWS PARA REGISTRO DE ASISTENCIA DEL MEDICO
    public function asistenciasEspecialistas() {
        return view('views.beneficiarioAsistencia.asistenciasEspecialista');
    }

    public function formAsistenciaMedico() {
        return view('views.beneficiarioAsistencia.formAsistenciaMedico');
    }
}
