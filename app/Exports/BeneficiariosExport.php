<?php

namespace App\Exports;
use App\Models\Beneficiario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeneficiariosExport implements FromCollection, WithHeadings
{
    protected $beneficiarioId;

    public function __construct($beneficiarioId)
    {
        $this->beneficiarioId = $beneficiarioId;
    }

    public function collection()
    {
        return Beneficiario::with([
            'cob_medica', 'nacionalidad', 'comuna', 'colegio', 'derivante', 
            'antSalud', 'antSocial', 'diagnostico', 'familiares'
        ])->where('id', $this->beneficiarioId)->get()->map(function ($beneficiario) {
            return [
                'ID' => $beneficiario->id,
                'Estado' => $beneficiario->beneficiarioEstado == 1 ? 'Activo' : 'Inactivo',
                'RUT' => $beneficiario->beneficiarioRut . '-' . $beneficiario->beneficiarioDv,
                'Nombre Completo' => "{$beneficiario->beneficiarioPNombre} {$beneficiario->beneficiarioSNombre} {$beneficiario->beneficiarioApPaterno} {$beneficiario->beneficiarioApMaterno}",
                'Fecha de Nacimiento' => $beneficiario->beneficiarioFecNac,
                'Teléfono' => $beneficiario->beneficiarioTelefono,
                'Nacionalidad' => optional($beneficiario->nacionalidad)->nombreNacionalidad,
                'Previsión Médica' => optional($beneficiario->cob_medica)->nombreCobMed,
                'Comuna' => optional($beneficiario->comuna)->nombreComuna,
                'Domicilio' => $beneficiario->beneficiarioDomicilio,
                'Vive en casa' => $beneficiario->beneficiarioTipDom,

                // Datos del colegio
                '¿Asiste al colegio?' => optional($beneficiario->colegio)->colegioAsiste ? 'Sí' : 'No',
                'Nombre del Colegio' => optional($beneficiario->colegio)->colegioNombre ?? 'N/A',
                'Teléfono del Colegio' => optional($beneficiario->colegio)->colegioTelefono ?? 'N/A',
                'Curso' => optional($beneficiario->colegio)->colegioCurso ?? 'N/A',
                'Profesor Jefe' => optional($beneficiario->colegio)->colegioProfJefe ?? 'N/A',

                // Datos del derivante
                'Nombre del Derivante' => optional($beneficiario->derivante)->derivanteNombre ?? 'N/A',
                'Observaciones del Derivante' => optional($beneficiario->derivante)->derivanteObservaciones ?? 'N/A',

                // Datos de los familiares
                'Familiares' => $beneficiario->familiares->map(function ($familiar) {
                    return "{$familiar->familiarPNombre} {$familiar->familiarSNombre} {$familiar->familiarApPaterno} ({$familiar->familiarParentesco})";
                })->implode(', '),

                // Antecedentes de Salud
                'NEE' => optional($beneficiario->antSalud)->antSalNEE ?? 'N/A',
                'Enfermedades Crónicas' => optional($beneficiario->antSalud)->antSalEnfCronica ?? 'N/A',
                'Tratamientos Actuales' => optional($beneficiario->antSalud)->antSalTratamiento ?? 'N/A',
                'Ha tenido cirugías' => optional($beneficiario->antSalud)->antSalCirugia ? 'Sí' : 'No',
                'Descripción Cirugías' => optional($beneficiario->antSalud)->antSalDescCirugia ?? 'N/A',

                // Antecedentes Sociales
                'Cuenta con ficha familiar' => optional($beneficiario->antSocial)->antSocFichaFamiliar ? 'Sí' : 'No',
                'Puntaje' => optional($beneficiario->antSocial)->antSocPtj ?? 'N/A',
                'Beneficios' => optional($beneficiario->antSocial)->antSocBeneficio ?? 'N/A',
                'Cuenta con credencial de discapacidad' => optional($beneficiario->antSocial)->antSocCredDiscapacidad ? 'Sí' : 'No',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID', 'Estado', 'RUT', 'Nombre Completo', 'Fecha de Nacimiento', 'Teléfono',
            'Nacionalidad', 'Previsión Médica', 'Comuna', 'Domicilio', 'Vive en casa',
            '¿Asiste al colegio?', 'Nombre del Colegio', 'Teléfono del Colegio', 'Curso', 'Profesor Jefe',
            'Nombre del Derivante', 'Observaciones del Derivante',
            'Familiares',
            'NEE', 'Enfermedades Crónicas', 'Tratamientos Actuales', 'Ha tenido cirugías', 'Descripción Cirugías',
            'Cuenta con ficha familiar', 'Puntaje', 'Beneficios', 'Cuenta con credencial de discapacidad'
        ];
    }
}

