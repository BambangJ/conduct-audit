<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\TmqmAuditChecklist;
use App\Models\TmqmAuditQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class controller_Conduct_Audit extends Controller
{
    protected $i_id_audit_cklsnmbr = "";

    // Menampilkan halaman utama
    public function index()
    {
        return view('audit_program');
    }

    // Menampilkan halaman untuk NCR
    public function createNCR()
    {
        return view('ncr.index');
    }

    // Menampilkan halaman tabel audit
    public function showAuditTable()
    {
        return view('audit_table');
    }

    // Menampilkan halaman untuk membuat checklist audit
    public function createAuditChecklist()
    {
        return view('create_audit_checklist');
    }

    // Menampilkan halaman update checklist audit
    public function updateAuditChecklist()
    {
        return view('update_audit_checklist');
    }

    // Menampilkan halaman meeting audit checklist
    public function meetingAuditChecklist()
    {
        return view('audit_meeting');
    }

    // Proses menyimpan checklist audit dan audit questions
    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            if ($this->storeAuditChecklist($request)) {
                $this->storeAuditQuestions($request);
            } else {
                throw new \Exception('Gagal memasukkan data audit checklist.');
            }
        });
        return redirect()->route('audit.index')->with('success', 'Audit checklist and questions saved successfully!');
    }

    // Menyimpan data audit checklist
    public function storeAuditChecklist(Request $request)
    {
        Log::info('Memulai penyimpanan audit checklist', ['request' => $request->all()]);
        $request->validate([
            'audit_plan_no' => 'required|string|max:12',
            'audit_type' => 'required|string|max:40',
            'program_code' => 'required|string|max:12',
            'subject' => 'required|string|max:120',
            'date_of_audit' => 'required|date',
            'area_manager' => 'required|string|max:12',
            'concurrence' => 'required|string|max:12',
        ]);


        // Generate Audit Checklist Number
        $auditTypeInitials = strtoupper(substr($request->audit_type, 0, 2));
        $programCode = strtoupper($request->program_code);

        $lastAudit = TmqmAuditChecklist::where('i_id_audchknbr', 'LIKE', "$auditTypeInitials/$programCode/%")
            ->orderBy('i_id_audchknbr', 'desc')
            ->first();

        $newNumber = $lastAudit ? str_pad(((int)substr($lastAudit->i_id_audchknbr, -3)) + 1, 3, '0', STR_PAD_LEFT) : '001';
        $this->i_id_audit_cklsnmbr = "$auditTypeInitials/$programCode/$newNumber";


        TmqmAuditChecklist::create([
            'i_id_audchknbr' => $this->i_id_audit_cklsnmbr,
            'i_id_audplnnbr' => $request->audit_plan_no,
            'n_aud_type' => $request->audit_type,
            'i_id_pgmcode' => $request->program_code,
            'n_aud_plan' => $request->subject,
            'd_actl_audstart' => $request->date_of_audit,
            'i_id_areamgr' => $request->area_manager,
            'i_id_cncrnc' => $request->concurrence // Menyimpan waktu saat ini
        ]);

        return true;
    }

    // Menyimpan data audit questions
    public function storeAuditQuestions(Request $request)
    {
        $auditDataArray = json_decode($request->input('audit_details'), true);

        foreach ($auditDataArray as $auditData) {
            TmqmAuditQuestion::create([
                'i_id_audchknbr' => $this->i_id_audit_cklsnmbr ?? 'DEFAULT_ID',
                'i_id_reff' => $auditData['reference'],
                'n_audit_question' => $auditData['question'],
                'n_audit_findings' => $auditData['findings'],
                'n_objective_evidence' => $auditData['evidence'] ?? null,
                'n_note' => $auditData['note'] ?? null,
                'n_attachment' => $auditData['attachment'] ?? null, // Menyimpan waktu saat ini
            ]);
        }
        return redirect()->route('audit.index')->with('success', 'Audit checklist and questions saved successfully!');
    }
}
