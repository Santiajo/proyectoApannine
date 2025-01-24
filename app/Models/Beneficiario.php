<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beneficiario extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'beneficiario';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'beneficiarioEstado',
        'beneficiarioRut',
        'beneficiarioDv',
        'beneficiarioPNombre',
        'beneficiarioSNombre',
        'beneficiarioApPaterno',
        'beneficiarioApMaterno',
        'beneficiarioFecNac',
        'beneficiarioTelefono',
        'beneficiarioDomicilio',
        'beneficiarioTipDom',
        'cob_med_id',
        'nacionalidad_id',
        'comuna_id',
        'colegio_id',
        'derivante_id',
        'antSal_id',
        'antSoc_id',
    ];

    protected $casts = [
        'beneficiarioFecNac' => 'date',
    ];

    // CREAMOS RELACIÓN CON EL MODELO COBERTURA MEDICA
    public function cob_medica()
    {
        return $this->belongsTo(Cob_Medica::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO NACIONALIDAD
    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO COMUNA
    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO COLEGIO
    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO DERIVANTE
    public function derivante()
    {
        return $this->belongsTo(Derivante::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO ANTECEDENTES SALUD
    public function antSalud()
    {
        return $this->belongsTo(antecedenteSalud::class);
    }

    // CREAMOS RELACIÓN CON EL MODELO ANTECEDENTES SOCIALES
    public function antSocial()
    {
        return $this->belongsTo(antecedenteSocial::class);
    }
}
