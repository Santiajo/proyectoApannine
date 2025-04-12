<?php

namespace App\Exports;

use App\Models\Beneficiario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class BeneficiariosTablaExport implements FromCollection, WithHeadings
{
    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function collection()
    {
        $beneficiarios = Beneficiario::with('familiarCuidador')
            ->whereBetween('created_at', [$this->fromDate, $this->toDate])
            ->get();

        return $beneficiarios->map(function ($b) {
            return [
                'Fecha ingreso' => $b->created_at->format('Y-m-d'),
                'Rut' => $b->beneficiarioRut . '-' . $b->beneficiarioDv,
                'Nombre' => "{$b->beneficiarioPNombre} {$b->beneficiarioApPaterno}",
                'Nombre cuidador' => $b->familiarCuidador->isNotEmpty()
                    ? $b->familiarCuidador->map(fn($c) => "{$c->familiarPNombre} {$c->familiarApPaterno} ({$c->familiarParentesco})")->implode(', ')
                    : 'No tiene cuidador',
                'Teléfono cuidador' => $b->familiarCuidador->isNotEmpty()
                    ? $b->familiarCuidador->pluck('familiarTelefono')->implode(', ')
                    : 'No tiene cuidador',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Fecha ingreso',
            'Rut',
            'Nombre',
            'Nombre cuidador',
            'Teléfono cuidador',
        ];
    }
}

