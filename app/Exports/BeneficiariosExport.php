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
                'Estado' => $beneficiario->beneficiarioEstado,
                'RUT' => $beneficiario->beneficiarioRut . '-' . $beneficiario->beneficiarioDv,
                'Nombre Completo' => "{$beneficiario->beneficiarioPNombre} {$beneficiario->beneficiarioSNombre} {$beneficiario->beneficiarioApPaterno} {$beneficiario->beneficiarioApMaterno}",
                'Fecha de Nacimiento' => $beneficiario->beneficiarioFecNac,
                'Teléfono' => $beneficiario->beneficiarioTelefono,
                'Domicilio' => $beneficiario->beneficiarioDomicilio,
                'Cobertura Médica' => optional($beneficiario->cob_medica)->nombre,
                'Nacionalidad' => optional($beneficiario->nacionalidad)->nombre,
                'Comuna' => optional($beneficiario->comuna)->nombre,
                'Colegio' => optional($beneficiario->colegio)->colegioNombre,
                'Derivante' => optional($beneficiario->derivante)->derivanteNombre,
                'Diagnóstico' => optional($beneficiario->diagnostico)->diagnosticoDesc,
                'Antecedentes de Salud' => optional($beneficiario->antSalud)->antSalEnfCronica,
                'Antecedentes Sociales' => optional($beneficiario->antSocial)->antSocBeneficio,
                'Familiares' => $beneficiario->familiares->pluck('familiarPNombre')->implode(', ')
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID', 'Estado', 'RUT', 'Nombre Completo', 'Fecha de Nacimiento', 'Teléfono',
            'Domicilio', 'Cobertura Médica', 'Nacionalidad', 'Comuna', 'Colegio', 
            'Derivante', 'Diagnóstico', 'Antecedentes de Salud', 'Antecedentes Sociales', 'Familiares'
        ];
    }
}

