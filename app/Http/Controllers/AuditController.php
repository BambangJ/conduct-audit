<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        // Menampilkan halaman utama
        return view('audit.index');
    }

    public function showAuditTable()
    {
        // Menampilkan tabel audit
        return view('audit.audit-table');
    }

    public function createAuditChecklist()
    {
        // Menampilkan halaman untuk membuat checklist audit
        return view('audit.create-audit-checklist');
    }

    public function updateAuditChecklist(Request $request)
    {
        // Logika untuk memperbarui checklist audit
        // Ambil data dari $request dan proses sesuai kebutuhan
        return view('audit.update-audit-checklist');
        // return redirect()->route('audit.table')->with('status', 'Checklist audit berhasil diperbarui.');
    }
}
