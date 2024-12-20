@extends('index')

@section('title', 'Approval Table')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Approval Table</h2>
    <!-- Approval Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="approvalTable">
            <thead class="thead-dark">
                <tr>
                    <th>Nomor Rencana Audit</th>
                    <th>Jenis Audit</th>
                    <th>Kode Program</th>
                    <th>Subjek</th>
                    <th>Tanggal Audit</th>
                    <th>Area Manager</th>
                    <th>Konkurensi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="approvalTableBody">
                <!-- Data dummy ganti sama data dari create audit -->
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn btn-success btn-sm">Approve</button>
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript -->

@endsection
