<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmqmAuditNonconformityReports extends Model
{
    protected $table = 'tmqmauditnonconformityreports'; // Nama tabel

    protected $fillable = [
        'i_id_ncrnnbr',
        'i_id_audchknbr',
        'n_quality_element',
        'n_classification',
        'n_key_requirement',
        'n_reference',
        'n_responsible_mngr',
        'n_objective_evidence',
        'n_attachment',
        'n_root_cause',
        'n_impact',
        'n_details',
        'i_emp',
        'd_entry',
    ];

    protected $primaryKey = 'i_id_ncrnnbr'; // Primary key
    public $incrementing = true; // Primary key menggunakan auto-increment
    protected $keyType = 'int'; // Tipe primary key
    public $timestamps = false; // Tidak menggunakan kolom timestamps
}
