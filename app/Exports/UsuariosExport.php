<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UsuariosExport implements FromCollection, WithHeadings
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
        return User::whereBetween('created_at', [$this->fromDate, $this->toDate])->get([
            'id', 
            DB::raw("CONCAT(primer_nombre, ' ', COALESCE(segundo_nombre, ''), ' ', apellido_paterno, ' ', apellido_materno) AS nombre_completo"),
            'email', 
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Correo', 'Fecha de Registro'];
    }
}