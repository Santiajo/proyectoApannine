<?php

namespace App\Exports;

use App\Models\Especialista;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EspecialistasExport implements FromCollection, WithHeadings
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
        return Especialista::whereBetween('created_at', [$this->fromDate, $this->toDate])->get([
            'especialistaRut', 
            'especialistaPNombre', 
            'especialistaTelefono', 
            'especialistaCorreo',
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return ['Rut', 'Nombre', 'Teléfono', 'Correo', 'Fecha de Registro'];
    }
}