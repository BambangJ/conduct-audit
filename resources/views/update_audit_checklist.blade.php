@extends('index') <!-- Gunakan layout utama -->

@section('content')

<div id="page-content" class="container-fluid">
    <!-- Modal untuk Initial Screen -->
    @include('include.initial-screen')

    <div id="mainContent" style="display: none;">
        <form class="audit-form" method="POST">
            @csrf <!-- Token CSRF untuk keamanan -->

            <div class="row">
                <div class="col-md-6">
                    <label for="audit_plan_no">Nomor Rencana Audit:</label>
                    <input type="text" id="audit_plan_no" name="audit_plan_no" value="2024-IA-01" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="audit_type">Jenis Audit:</label>
                    <input type="text" id="audit_type" name="audit_type" value="Initial Audit" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="program_code">Kode Program:</label>
                    <select id="program_code" name="program_code" class="form-control" readonly>
                        <option value="AH">AH</option>
                    </select><br>
                </div>
                <div class="col-md-6">
                    <label for="subject">Subjek:</label>
                    <input type="text" id="subject" name="subject" value="Internal Audit Airbus Helicopter" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="date_of_audit">Tanggal Audit:</label>
                    <input type="date" id="date_of_audit" name="date_of_audit" value="2024-12-12" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="area_manager">Area Manager:</label>
                    <input type="text" id="area_manager" name="area_manager" value="Ilham Kurnia" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="concurrence">Konkurensi:</label>
                    <input type="text" id="concurrence" name="concurrence" value="Dwi Haryono" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="concurrence">Audit Checklist No:</label>
                    <input type="text" id="audit_checklist_no" name="audit_checklist_no" value="IA/AH/001" class="form-control" readonly><br>
                </div>
                <div class="col-md-6">
                    <label for="display_audit">Audit Checklist:</label>
                    <a href="{{ url('table') }}" class="btn btn-primary">Display Audit Checklist</a>
                </div>
                <div class="col-md-6">
                    <label>Closing Meeting:</label>
                    <input type="radio" name="meeting" id="meeting_yes" value="yes"> Yes
                    <input type="radio" name="meeting" id="meeting_no" value="no"> No
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit_action" value="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" name="submit_action" value="cancel" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('include.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tambahkan event listener ke radio button
        const meetingYes = document.getElementById('meeting_yes');
        const meetingNo = document.getElementById('meeting_no');

        // Jika tombol "Yes" diklik, arahkan ke halaman audit_meeting.blade.php
        meetingYes.addEventListener('change', function() {
            if (this.checked) {
                window.location.href = "{{ route('audit_meeting') }}";
            }
        });

        // Tambahkan event handler ke tombol "No" jika diperlukan logika tambahan
        meetingNo.addEventListener('change', function() {
            if (this.checked) {
                alert('No Closing Meeting selected.');
            }
        });
    });
</script>

@endsection