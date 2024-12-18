<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmqmAuditChecklist extends Model
{

    protected $table = 'tmqmauditchecklist';

    protected $fillable = [
        'i_id_audchknbr',
        'i_id_audplnnbr',
        'n_aud_type',
        'i_id_pgmcode',
        'n_aud_plan',
        'd_actl_audstart',
        'i_id_areamgr',
        'i_id_cncrnc',
        'i_emp',
        'd_entry'
    ];

    public $timestamps = false;


    protected $primaryKey = 'i_id_audchknbr';
    public $incrementing = false;
    protected $keyType = 'string';

    // Tambahkan casts untuk konversi otomatis tipe data
    protected $casts = [
        'd_actl_audstart' => 'date',
        'd_entry' => 'datetime',
    ];
}
