<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmqmAuditContainmentActions extends Model
{
    protected $table = 'tmqmauditcontainmentactions'; // Nama tabel

    protected $fillable = [
        'i_id_containment_nmbrn',
        'i_id_ncrnnbr',
        'n_action',
        'n_evidence',
        'n_responsible',
        'd_ecd',
    ];

    protected $primaryKey = 'i_id_containment_nmbrn'; // Primary key
    public $incrementing = true; // Primary key menggunakan auto-increment
    protected $keyType = 'int'; // Tipe primary key
    public $timestamps = false; // Tidak menggunakan kolom timestamps

}
