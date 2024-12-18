<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_Conduct_Audit_Question extends Model
{
    protected $table = 'tmqmauditquestion';

    protected $fillable = [
        'i_id_question',
        'i_id_audit_cklsnmbr',
        'i_id_reff',
        'n_audit_question',
        'n_audit_findings',
        'n_objective_evidence',
        'n_note',
        'n_attachment'
    ];

    public $timestamps = false;
    protected $primaryKey = 'i_id_question';
    public $incrementing = true;
    protected $keyType = 'int';
}
