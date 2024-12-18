@extends('index') <!-- Menggunakan layout utama, bisa disesuaikan -->

@section('content')
<div id="page-content" class="container-fluid">
    {{-- action="{{ route('proses_audit') }}" --}}
    <div id="mainContent">
        <form class="audit-form" method="post">
            @csrf <!-- Token CSRF untuk keamanan form -->
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_plan_no">Audit Plan No:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="audit_plan_no" name="audit_plan_no" value="2024-IA-01" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Audit Checklist No:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="audit_check_no" name="audit_check_no" value="IA/AH/001" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="program_code">Year :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="year" name="year" value="2024" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Audit Team:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="audit_team" name="audit_team" value="QA00000/DIVISI MUTU" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Audit type:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="audit_type" name="audit_type" value="Initial Audit" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Audit Plan:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="audit_plan" name="audit_plan" value="Initial Audit Test QA000" class="form-control" readonly><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Tempat:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="tempat" name="tempat" value="" class="form-control" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="audit_type">Link Meeting:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" id="link_m" name="link_m" value="Initial Audit" class="form-control" required><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="time">Time:</label>
                </div>
                <div class="col-md-4">
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <input type="time" id="hour-minute" name="hour-minute" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" name="submit_action" value="submit" class="form-control">Submit</button>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="submit_action" value="cancel" class="form-control">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection