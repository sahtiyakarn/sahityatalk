<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Attendance;

class AdminFeeController extends Controller
{

    function fee(Request $request)
    {
        return view('/admin/fee/fee');
    }


    function feeFind(Request $request)
    {
        $id = $request->find;
        $slipno1 = Fee::orderBy('id', 'desc')->first();
        $slipno2 = $slipno1->slipno;
        $slipno = $slipno2 + 1;
        $data = Student::where('id', $id)->first();
        return view('/admin/fee/fee', compact('data', 'slipno'));
    }

    function feeAdd(Request $request)
    {
        $month = substr($request->fdd, 3);
        $subtotal = $request->mfee + $request->rfee + $request->efee + $request->bfee;
        $Fee = new Fee;
        $Fee->sid = $request->id;
        $Fee->fdd = $request->fdd;
        $Fee->mfee = $request->mfee;
        $Fee->rfee = $request->rfee;
        $Fee->bal = $request->bal;
        $Fee->exam = $request->exam;
        $Fee->efee = $request->efee;
        $Fee->book = $request->book;
        $Fee->bfee = $request->bfee;
        $Fee->cmt = $request->cmt;
        $Fee->slipno = $request->slipno;
        $Fee->month = $month;
        $Fee->subtotal = $subtotal;
        $Fee->save();
        return redirect('/fee')->with("success", "Your Data is Saved");
    }

    function feeedit($fid)
    {
        $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where('fees.id', $fid)->orderBy('fees.id', 'desc')->first(['fees.*', 'students.name', 'students.reg', 'students.time', 'students.photo']);
        return view('/admin/fee/feeedit', compact('data', 'fid'));
    }

    function feeeditsave(Request $request)
    {
        $request->fid;
        $month = substr($request->fdd, 3);
        $subtotal = $request->mfee + $request->rfee + $request->efee + $request->bfee;
        $Fee = Fee::find($request->fid);
        $Fee->fdd = $request->fdd;
        $Fee->mfee = $request->mfee;
        $Fee->rfee = $request->rfee;
        $Fee->bal = $request->bal;
        $Fee->exam = $request->exam;
        $Fee->efee = $request->efee;
        $Fee->book = $request->book;
        $Fee->bfee = $request->bfee;
        $Fee->cmt = $request->cmt;
        $Fee->slipno = $request->slipno;
        $Fee->month = $month;
        $Fee->subtotal = $subtotal;
        $Fee->save();
        return redirect('/feeshow')->with("success", "Your Data is Saved");
    }

    function feeShow()
    {
        $cdate = date('d-M-Y');
        $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where('fdd', $cdate)->orderBy('fees.id', 'desc')->get(['fees.*', 'students.name', 'students.reg', 'students.time', 'students.photo']);
        $total = Fee::where('fdd', $cdate)->get()->sum(['subtotal']);;
        $cyy = date('Y');
        $cmm = date('M');
        $cdd = date('d');
        return view('/admin/fee/feeShow', compact('data', 'cyy', 'cdd', 'cmm', 'total'));
    }

    function feeFindWithID(Request $request)
    {
        $id = $request->findID;
        $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where('fees.sid', $id)->orderBy('fees.id', 'desc')->get(['fees.*', 'students.name', 'students.reg', 'students.time', 'students.photo']);
        $mfee = Fee::where('id', $id)->get()->sum(['mfee']);
        $rfee = Fee::where('id', $id)->get()->sum(['rfee']);
        $efee = Fee::where('id', $id)->get()->sum(['efee']);
        $bfee = Fee::where('id', $id)->get()->sum(['bfee']);
        $total = $mfee + $rfee + $efee + $bfee;
        $cyy = date('Y');
        $cmm = date('M');
        $cdd = date('d');
        return view('/admin/fee/feeShow', compact('data', 'cyy', 'cdd', 'cmm', 'total'));
    }

    function feeFindWithDate(Request $request)
    {
        $day = $request->dd;
        $month = $request->mm;
        $year = $request->yy;
        if (!empty($day) and !empty($month) and !empty($year)) {
            $fdd =  $day . "-" . $month . "-" . $year;
            $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where('fdd', $fdd)->get(['fees.*', 'students.name', 'students.reg', 'students.time', 'students.photo']);
            $mfee = Fee::where('fdd', $fdd)->get()->sum(['mfee']);
            $rfee = Fee::where('fdd', $fdd)->get()->sum(['rfee']);
            $efee = Fee::where('fdd', $fdd)->get()->sum(['efee']);
            $bfee = Fee::where('fdd', $fdd)->get()->sum(['bfee']);
            $total = $mfee + $rfee + $efee + $bfee;
            $cyy = date('Y');
            $cmm = date('M');
            $cdd = date('d');
            return view('/admin/fee/feeShow', compact('data', 'cyy', 'cdd', 'cmm', 'total'));
        } elseif (!empty($month) and !empty($year)) {
            $fdd =  $day . "-" . $month . "-" . $year;
            $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where(Fee::raw('mid(fdd,4,3)'), '=', $month)->where(Fee::raw('mid(fdd,8,4)'), '=', $year)->get(['fees.*', 'students.name', 'students.reg', 'students.time']);
            $mfee =  Fee::where(Fee::raw('mid(fdd,4,3)'), '=', $month)->where(Fee::raw('mid(fdd,8,4)'), '=', $year)->get()->sum("mfee");
            $rfee =  Fee::where(Fee::raw('mid(fdd,4,3)'), '=', $month)->where(Fee::raw('mid(fdd,8,4)'), '=', $year)->get()->sum("rfee");
            $efee =  Fee::where(Fee::raw('mid(fdd,4,3)'), '=', $month)->where(Fee::raw('mid(fdd,8,4)'), '=', $year)->get()->sum("efee");
            $bfee =  Fee::where(Fee::raw('mid(fdd,4,3)'), '=', $month)->where(Fee::raw('mid(fdd,8,4)'), '=', $year)->get()->sum("bfee");
            $total = $mfee + $rfee + $efee + $bfee;
            $cyy = date('Y');
            $cmm = date('M');
            $cdd = date('d');
            return view('/admin/fee/feeShow', compact('data', 'cyy', 'cdd', 'cmm', 'total'));
        } else {
            $cyy = date('Y');
            $cmm = date('M');
            $cdd = date('d');
            return redirect('/fee/feeshow');
        }
    }


    function feeShowWithID($id)
    {
        $data = Fee::join('students', 'fees.sid', '=', 'students.id')->where('fees.sid', $id)->orderBy('fees.id', 'desc')->get(['fees.*', 'students.name', 'students.reg', 'students.time', 'students.photo']);
        $mfee = Fee::select('mfee')->where('sid', $id)->where('mfee', '>=', '1')->get();
        $totalfee = $mfee->count();
        return view('/admin/fee/feeShowID', compact('data', 'totalfee'));
    }

    function attendanceShowWithID($id)
    {
        $data = Attendance::where('sid', $id)->orderBy('id', 'desc')->get();
        return view('/admin/fee/attendanceSowID', compact('data'));
    }
}