@extends('index')

@section('content')
@include('include.header')

<div id="page-content" class="container-fluid">
    <div id="mainContent">
        <h4>Audit Program</h4>
        <div class="table-responsive">
            <table id="auditProgramTable" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Audit Plan No.</th>
                        <th>Audit Type</th>
                        <th>Audit Plan</th>
                        <th>Plan Date Start</th>
                        <th>Plan Finish Date</th>
                        <th>Quality Audit Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data dari JSON akan diisi di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableBody = document.querySelector('#auditProgramTable tbody');

        // JSON data statis
        const result = {
            "code": 200,
            "message": "Data found",
            "data": [{
                    "i_aud_plnnbr": "2024-IA-01",
                    "d_aud_year": "2024",
                    "i_aud_rvspgmnbr": "0.0",
                    "i_id_audpgm": "140",
                    "i_emp_auditorlead": null,
                    "n_aud_type": "INITIAL AUDIT",
                    "n_aud_plan": "Internal Quality Audit",
                    "c_aud_org": "QA0000",
                    "d_aud_start": "04-10-2024",
                    "d_aud_finish": "05-10-2024",
                    "i_id_cncrnc": "Bima Anggara",
                    "f_aud_submit": null
                },
                {
                    "i_aud_plnnbr": "2024-IA-02",
                    "d_aud_year": "2024",
                    "i_aud_rvspgmnbr": "0.0",
                    "i_id_audpgm": "141",
                    "i_emp_auditorlead": "Emp001",
                    "n_aud_type": "INITIAL AUDIT",
                    "n_aud_plan": "Supplier Performance Evaluation",
                    "c_aud_org": "QA1001",
                    "d_aud_start": "06-10-2024",
                    "d_aud_finish": "07-10-2024",
                    "i_id_cncrnc": "Bobi Putra",
                    "f_aud_submit": null
                },
                {
                    "i_aud_plnnbr": "2024-IA-03",
                    "d_aud_year": "2024",
                    "i_aud_rvspgmnbr": "0.0",
                    "i_id_audpgm": "142",
                    "i_emp_auditorlead": "Emp002",
                    "n_aud_type": "INITIAL AUDIT",
                    "n_aud_plan": "External Supplier Audit",
                    "c_aud_org": "QA2002",
                    "d_aud_start": "08-10-2024",
                    "d_aud_finish": "09-10-2024",
                    "i_id_cncrnc": "Ilham Rama",
                    "f_aud_submit": null
                },
                {
                    "i_aud_plnnbr": "2024-IA-04",
                    "d_aud_year": "2024",
                    "i_aud_rvspgmnbr": "0.0",
                    "i_id_audpgm": "143",
                    "i_emp_auditorlead": "Emp003",
                    "n_aud_type": "INITIAL AUDIT",
                    "n_aud_plan": "Re-Audit for Process Improvement",
                    "c_aud_org": "QA3003",
                    "d_aud_start": "10-10-2024",
                    "d_aud_finish": "11-10-2024",
                    "i_id_cncrnc": "Arya Halim",
                    "f_aud_submit": null
                }
            ]
        };

        // Proses data dari JSON
        if (result.code === 200 && result.data.length > 0) {
            result.data.forEach((data, index) => {
                // Tambahkan baris ke tabel
                const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${data.i_aud_plnnbr}</td>
                    <td>${data.n_aud_type}</td>
                    <td>${data.n_aud_plan}</td>
                    <td>${data.d_aud_start}</td>
                    <td>${data.d_aud_finish}</td>
                    <td>${data.c_aud_org}</td>
                    <td>
                        <button class="btn btn-primary btn-select" 
                                data-plan-no="${data.i_aud_plnnbr}" 
                                data-audit-type="${data.n_aud_type}" 
                                data-audit-plan="${data.n_aud_plan}" 
                                data-date-start="${data.d_aud_start}" 
                                data-date-finish="${data.d_aud_finish}" 
                                data-cncrnc="${data.i_id_cncrnc}" 
                                data-quality-unit="${data.c_aud_org}">
                            +
                        </button>
                    </td>
                </tr>
            `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        } else {
            tableBody.innerHTML = '<tr><td colspan="8">No data available</td></tr>';
        }

        // Tambahkan event listener ke tombol "+"
        document.querySelectorAll('.btn-select').forEach(button => {
            button.addEventListener('click', function() {
                const auditData = {
                    planNo: this.dataset.planNo,
                    auditType: this.dataset.auditType,
                    auditPlan: this.dataset.auditPlan,
                    dateStart: this.dataset.dateStart,
                    dateFinish: this.dataset.dateFinish,
                    qualityUnit: this.dataset.qualityUnit,
                    concurence: this.dataset.cncrnc

                };

                // Simpan data ke sessionStorage
                sessionStorage.setItem('selectedAuditData', JSON.stringify(auditData));

                // Arahkan ke halaman create_audit_checklist
                window.location.href = "{{ route('audit.create') }}";
            });
        });
    });
</script>
@endsection