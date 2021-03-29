<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $cdate = date('M-Y');
        $student = Student::where(Student::raw('mid(doa,4,9)'), '=', $cdate)->get();
        $studentcount = $student->count();
        $data = Student::where('comment', 'studing')->get();
        $totalstudent = $data->count();
        return view('/admin/dashboard', compact('totalstudent', 'studentcount'));
    }
}