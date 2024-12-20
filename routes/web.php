<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_Conduct_Audit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [controller_Conduct_Audit::class, 'index'])->name('audit.index');
Route::get('/fetch-sap-data', [controller_Conduct_Audit::class, 'fetchData']);

Route::get('/ncr', [controller_Conduct_Audit::class, 'createNCR'])->name('ncr.create');

// Rute untuk proses audit (simpan checklist audit)
Route::post('/proses_audit', [controller_Conduct_Audit::class, 'store'])->name('proses_audit');
Route::post('/save-audit-questions', [controller_Conduct_Audit::class, 'storeAuditQuestions'])->name('save.audit.questions');

Route::post('/store-audit-questions', [controller_Conduct_Audit::class, 'storeAuditQuestions']);

// Rute untuk menampilkan tabel audit
Route::get('/table', [controller_Conduct_Audit::class, 'showAuditTable'])->name('audit.table');

// Rute untuk menampilkan halaman create audit checklist
Route::get('/create', [controller_Conduct_Audit::class, 'createAuditChecklist'])->name('audit.create');

// Rute untuk memperbarui audit checklist
Route::get('/update', [controller_Conduct_Audit::class, 'updateAuditChecklist'])->name('audit.update');

// Rute untuk menampilkan meeting audit checklist
Route::get('/audit_meeting', [controller_Conduct_Audit::class, 'meetingAuditChecklist'])->name('audit_meeting');

// Rute Sementara -r
Route::get('approve', function()
{
return View::make('approval_table');
});