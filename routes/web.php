<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminFeeController;
use App\Http\Controllers\AdminOtherController;
use App\Http\Controllers\AdminDashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/login', function () {
//     return view('auth.login');
// });


Route::view('login', 'login1');

Route::any('/', [HomepageController::class, 'index']);
Route::any('/index', [HomepageController::class, 'index']);
Route::any('/enquiryadd', [HomepageController::class, 'enquiryadd']);
Route::any('/aboutus', [HomepageController::class, 'aboutus']);
Route::any('/course', [HomepageController::class, 'mycourse']);
Route::any('/contactus', [HomepageController::class, 'contactus']);
Route::any('/emessage_submit', [HomepageController::class, 'emessage_submit']);
Route::any('/emarksheet_find', [HomepageController::class, 'emarksheet_find']);
Route::any('/emarksheet_find_submit', [HomepageController::class, 'emarksheet_find_submit']);
Route::any('/emarksheet_otp', [HomepageController::class, 'emarksheet_otp']);
Route::any('/emarksheet_otp_submit', [HomepageController::class, 'emarksheet_otp_submit']);
Route::any('/marksheet_show', [HomepageController::class, 'marksheet_show']);


// student
Route::post('/stuCheck', [StudentController::class, 'stuCheck']);
Route::any('/student/logout', function () {
    if (session()->has('student')) {
        Session()->flush();
    }
    return redirect('/');
});

Route::any('/student/dashboard', function () {
    if (session()->has('student')) {
        return view('studentpages.dashboard');
    } else {
        return redirect('/login');
    }
});
Route::get('/student/checkCourse', [StudentController::class, 'checkCourse']);
Route::post('/student/startTest', [StudentController::class, 'startTest']);
Route::get('/student/theory_checkCourse', [StudentController::class, 'theory_checkCourse']);
Route::any('/student/thoery_startTest', [StudentController::class, 'thoery_startTest']);
Route::any('/student/thoery_testsubmit', [StudentController::class, 'thoery_testsubmit']);
Route::post('/student/ansCheck', [StudentController::class, 'ansCheck']);
Route::any('/student/endtest', [StudentController::class, 'endtest']);
Route::any('/student/attendancecheck', [StudentController::class, 'attendancecheck']);
Route::any('/student/feecheck', [StudentController::class, 'feecheck']);
Route::any('/student/utmarkcheck', [StudentController::class, 'utmarkcheck']);

// attendance
Route::post('/attendance/tecCheck', [AttendanceController::class, 'tecCheck']);

Route::any('attendance/find', function () {
    if (session()->has('teacher')) {
        return view('attendancepages.find_id');
    } else {
        return redirect('/login');
    }
});

Route::any('/attendance/logout', function () {
    if (session()->has('teacher')) {
        Session()->flush();
    }
    return redirect('/login');
});

Route::post('/attendance/find_id_check', [AttendanceController::class, 'find_id_check']);
Route::get('/attendance/create_file', [AttendanceController::class, 'create_file']);
Route::post('/attendance/create_submit', [AttendanceController::class, 'create_submit']);

// Dashboard Panel
Route::middleware(['auth:sanctum', 'verified'])->any('/dashboard', [AdminDashboardController::class, 'dashboard']);

//StudentController
Route::middleware(['auth:sanctum', 'verified'])->get('/admission', [AdminStudentController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->get('/admissionall', [AdminStudentController::class, 'admissionAll']);
Route::middleware(['auth:sanctum', 'verified'])->any('/admissionshow', [AdminStudentController::class, 'admissionShow']);
Route::middleware(['auth:sanctum', 'verified'])->post('/admissionAdd', [AdminStudentController::class, 'admissionAdd']);
Route::middleware(['auth:sanctum', 'verified'])->get('/admissionedit/{id}', [AdminStudentController::class, 'AdmissionEdit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/AdmissionEditSave', [AdminStudentController::class, 'AdmissionEditSave']);
Route::middleware(['auth:sanctum', 'verified'])->any('/admissionphoto/{id}', [AdminStudentController::class, 'admissionphoto']);
Route::middleware(['auth:sanctum', 'verified'])->any('/admissionphotoupload', [AdminStudentController::class, 'admissionphotoupload']);
Route::middleware(['auth:sanctum', 'verified'])->any('/studentid', [AdminStudentController::class, 'studentid']);
Route::middleware(['auth:sanctum', 'verified'])->post('/studenticard', [AdminStudentController::class, 'icardadd']);
Route::middleware(['auth:sanctum', 'verified'])->any('/studentcover',  [AdminStudentController::class, 'studentcover']);
Route::middleware(['auth:sanctum', 'verified'])->any('/studentcoveradd', [AdminStudentController::class, 'studentcoveradd']);
Route::middleware(['auth:sanctum', 'verified'])->any('/admissionphoto', [AdminStudentController::class, 'admissionphoto']);
Route::middleware(['auth:sanctum', 'verified'])->any('/admissionid', [AdminStudentController::class, 'admissionid']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeno', [AdminStudentController::class, 'feeno']);
Route::middleware(['auth:sanctum', 'verified'])->any('/missing', [AdminStudentController::class, 'missing']);
Route::middleware(['auth:sanctum', 'verified'])->any('/completed', [AdminStudentController::class, 'completed']);
Route::middleware(['auth:sanctum', 'verified'])->any('/leave', [AdminStudentController::class, 'leave']);
Route::middleware(['auth:sanctum', 'verified'])->any('/badtransfer', [AdminStudentController::class, 'badtransfer']);
Route::middleware(['auth:sanctum', 'verified'])->any('/remain', [AdminStudentController::class, 'remain']);
Route::middleware(['auth:sanctum', 'verified'])->any('/emarksheet', [AdminStudentController::class, 'emarksheet']);
Route::middleware(['auth:sanctum', 'verified'])->any('/emarksheet_submit', [AdminStudentController::class, 'emarksheet_submit']);
Route::middleware(['auth:sanctum', 'verified'])->any('/emarksheet_update/{id}', [AdminStudentController::class, 'emarksheet_update']);
Route::middleware(['auth:sanctum', 'verified'])->any('/emarksheet_update_submit', [AdminStudentController::class, 'emarksheet_update_submit']);
Route::middleware(['auth:sanctum', 'verified'])->any('/emarksheet_delete/{id}', [AdminStudentController::class, 'emarksheet_delete']);

//FeeController
Route::middleware(['auth:sanctum', 'verified'])->any('/fee', [AdminFeeController::class, 'fee']);
Route::middleware(['auth:sanctum', 'verified'])->post('/feefind', [AdminFeeController::class, 'feefind']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeadd', [AdminFeeController::class, 'feeadd']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeedit/{fid}', [AdminFeeController::class, 'feeedit']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeeditsave', [AdminFeeController::class, 'feeeditsave']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeshow', [AdminFeeController::class, 'feeshow']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeFindWithID', [AdminFeeController::class, 'feeFindWithID']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeFindWithDate', [AdminFeeController::class, 'feeFindWithDate']);
Route::middleware(['auth:sanctum', 'verified'])->any('/feeshowwithid/{id}', [AdminFeeController::class, 'feeShowWithID']);
Route::middleware(['auth:sanctum', 'verified'])->any('/attendanceshowwithid/{id}', [AdminFeeController::class, 'attendanceShowWithID']);




// OtherController
Route::middleware(['auth:sanctum', 'verified'])->get('/niosshow', [AdminOtherController::class, 'niosshow']);
Route::middleware(['auth:sanctum', 'verified'])->any('/expenseadd', [AdminOtherController::class, 'expenseadd']);
Route::middleware(['auth:sanctum', 'verified'])->any('/expenseedit/{id}', [AdminOtherController::class, 'expenseedit']);
Route::middleware(['auth:sanctum', 'verified'])->any('/expenseeditsave', [AdminOtherController::class, 'expenseeditsave']);
Route::middleware(['auth:sanctum', 'verified'])->any('/expenseshow', [AdminOtherController::class, 'expenseshow']);
Route::middleware(['auth:sanctum', 'verified'])->any('/expensesshowwithdate', [AdminOtherController::class, 'expensesshowwithdate']);
Route::middleware(['auth:sanctum', 'verified'])->any('/balancesheet', [AdminOtherController::class, 'balancesheet']);
Route::middleware(['auth:sanctum', 'verified'])->any('/balancesheetadd', [AdminOtherController::class, 'balancesheetadd']);
Route::middleware(['auth:sanctum', 'verified'])->any('/balancesheetupdate/{id}/{month}', [AdminOtherController::class, 'balancesheetupdate']);
Route::middleware(['auth:sanctum', 'verified'])->any('/balancesheetupdatesave', [AdminOtherController::class, 'balancesheetupdatesave']);
Route::middleware(['auth:sanctum', 'verified'])->any('/enquiry', [AdminOtherController::class, 'enquiry']);
Route::middleware(['auth:sanctum', 'verified'])->any('/messageus', [AdminOtherController::class, 'messageus']);
Route::middleware(['auth:sanctum', 'verified'])->any('/thoery_test', [AdminOtherController::class, 'thoery_test']);
Route::middleware(['auth:sanctum', 'verified'])->any('/thoery_test_update/{id}', [AdminOtherController::class, 'thoery_test_update']);