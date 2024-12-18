<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmqmAuditQuestion extends Model
{
    protected $table = 'tmqmauditquestion'; // Nama tabel

    protected $fillable = [
        'i_id_question',
        'i_id_audchknbr',
        'i_id_reff',
        'n_audit_question',
        'n_audit_findings',
        'n_objective_evidence',
        'n_note',
        'n_attachment',
    ];

    protected $primaryKey = 'i_id_question'; // Primary key
    public $incrementing = true; // Primary key menggunakan auto-increment
    protected $keyType = 'int'; // Tipe primary key
    public $timestamps = false; // Tidak menggunakan kolom timestamps

    // Tambahkan casts untuk konversi otomatis tipe data
    protected $casts = [
        'd_actl_audstart' => 'date',
        'd_entry' => 'datetime',
    ];
}
