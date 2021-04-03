<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Nio;
use App\Models\Expenses;
use App\Models\Balancesheet;
use App\Models\Student;
use App\Models\Enquiry_form;
use App\Models\Emessage;
use App\Models\Thoery_answer;
use App\Models\Thoery_test;

class AdminOtherController extends Controller
{
    function niosshow()
    {
        $data = Nio::orderBy('id', 'desc')->get();
        return view('admin/other.niosshow', compact('data'));
    }


    function expenseshow()
    {
        $cyy = date('Y');
        $cmm = date('M');
        $cdd = date('d');
        $cmonth = date('M-Y');
        $total = Expenses::where(['month' => $cmonth])->get()->sum('price');
        $data = Expenses::where(['month' => $cmonth])->orderBy('id', 'desc')->get();
        return view('admin.other.expenseshow', compact('data', 'cyy', 'cmm', 'cdd', 'total'));
    }
    function expensesshowwithdate(Request $request)
    {
        $cyy = date('Y');
        $cmm = date('M');
        $cdd = date('d');
        $dd = $request->input('day1');
        $mm = $request->input('months');
        $yy = $request->input('year');
        $does = $dd . '-' . $mm . '-' . $yy;
        if ((!empty($dd)) and (!empty($dd)) and (!empty($dd))) {

            $total = Expenses::where(['doe' => $does])->get()->sum('price');
            $data = Expenses::where(['doe' => $does])->orderBy('id', 'desc')->get();
            return view('admin.other.expenseshow', compact('data', 'cyy', 'cmm', 'cdd', 'total'));
        } else {

            $data = Expenses::where(Expenses::raw('mid(doe,4,3)'), '=', $mm)->where(Expenses::raw('mid(doe,8,4)'), '=', $yy)->get();
            $total = Expenses::where(Expenses::raw('mid(doe,4,3)'), '=', $mm)->where(Expenses::raw('mid(doe,8,4)'), '=', $yy)->get()->sum('price');
            return view('admin.other.expenseshow', compact('data', 'cyy', 'cmm', 'cdd', 'total'));
        }
    }

    function expenseedit($id)
    {
        $data1 = Expenses::find($id);
        return view('admin.other.expenseedit', compact('data1'));
    }

    function expenseadd(Request $request)
    {
        $month = substr($request->doe, 3);
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $data = new Expenses;
        $data->doe = $request->doe;
        $data->name = $request->name;
        $data->other = $request->other;
        $data->price = $request->price;
        $data->month = $month;
        $data->save();
        return redirect('/expenseshow')->with('success', 'Your Data is successfull saved');
    }



    function expenseeditsave(Request $request)
    {
        $month = substr($request->doe, 3);
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $data = Expenses::find($request->id);
        $data->doe = $request->doe;
        $data->name = $request->name;
        $data->other = $request->other;
        $data->price = $request->price;
        $data->month = $month;
        $data->save();
        return redirect('/expenseshow')->with('success', 'Your Data is successfull saved');
    }

    function balancesheet()
    {
        $data = Balancesheet::all();
        $cdate = date('d-M-Y');
        $month = date('M-Y');
        $expense = Expenses::where('month', $month)->get()->sum('price');
        $income = Fee::where('month', $month)->get()->sum('subtotal');
        $totalincome  = $income - $expense;
        return view('admin.other.balancesheet', compact('data', 'income', 'expense', 'totalincome', 'cdate'));
    }

    function balancesheetadd(Request $request)
    {
        $month = substr($request->month, 3);
        $fmonth = Balancesheet::select('month')->where('month', $month)->first();
        if (empty($fmonth->month)) {
            $expense = Expenses::where('month', $month)->get()->sum('price');
            $income = Fee::where('month', $month)->get()->sum('subtotal');
            $totalincome  = $income - $expense;
            $balancesheet = new Balancesheet();
            $balancesheet->month = $month;
            $balancesheet->income = $income;
            $balancesheet->expense = $expense;
            $balancesheet->balance = $totalincome;
            $balancesheet->save();
            return redirect('/balancesheet');
        } else {
            return redirect()->back()->with('alert', 'hello');
        }
    }

    function balancesheetupdate($id, $month)
    {
        $expense = Expenses::where('month', $month)->get()->sum('price');
        $income = Fee::where('month', $month)->get()->sum('subtotal');
        $totalincome  = $income - $expense;
        return view('admin.other.balancesheetupdate', compact('income', 'expense', 'totalincome', 'month', 'id'));
    }

    function balancesheetupdatesave(Request $request)
    {
        $balancesheet = Balancesheet::find($request->id);
        $balancesheet->income = $request->income;
        $balancesheet->expense = $request->expense;
        $balancesheet->month = $request->month;
        $balancesheet->balance = $request->totalincome;
        $balancesheet->save();
        return redirect('/balancesheet');
    }

    function enquiry()
    {
        $data = Enquiry_form::all();
        return view('admin.other.enquiry', compact('data'));
    }
    function messageus()
    {
        $data = Emessage::all();
        return view('admin.other.messageus', compact('data'));
    }
    function thoery_test()
    {
        $data = Thoery_answer::all();
        return view('admin.other.thoery_test', compact('data'));
    }
    function thoery_test_update($id)
    {
        $i = 1;
        $data = Thoery_answer::find($id);
        return view('admin.other.thoery_test_update', compact('data', 'i'));
    }

    function thoery_test_update_submit(Request $request)
    {
        return $request->input();
        return "hello";
        $i = 1;
        $data = Thoery_answer::find($id);
        return view('admin.other.thoery_test_update', compact('data', 'i'));
    }
}