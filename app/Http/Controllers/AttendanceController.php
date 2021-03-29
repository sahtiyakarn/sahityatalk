<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Teacher;

class AttendanceController extends Controller
{

    public function tecCheck(Request $request)
    {
        $name = strtolower($request->input('teacher'));
        $password1 = strtolower($request->input('password'));
        $id = substr($password1, 0, -8);
        $idno = strlen($id);
        $password = substr($password1, $idno, 8);
        $check = ['name' => $name, 'password' => $password, 'id' => $id];
        $data = teacher::where($check)->get()->first();
        if (!empty($data)) {
            $request->session()->put('teacher', $name . $password);
            return redirect('/attendance/find');
        } else {
            return back()->with('error', 'Your Name & Password is Wrong');
        }
    }


    function find_id_check(Request $r)
    {

        if (session()->has('teacher')) {
            $r->session()->get('teacher');
            $find_id = $r->input('find_id');

            // $str2 = substr($find_id, 2, 1);
            // $str3 = substr($find_id, 5, 1);
            // $str4 = substr($find_id, 8, 3);
            // $final_text = $str2 . $str3 . $str4;

            $data = Student::where('id', $find_id)->first();
            // return $data = Student::find('id', $final_text);

            if (empty($data)) {
                return back()->with('myerror', 'this is not valid id');
            } elseif ($data->active === 'Yes') {
                $r->session()->put('id', $data['id']);
                return redirect('attendance/create_file');
            } elseif ($data->comment == 'Fee No') {
                return back()->with('myerror', 'Fee समय पर नहीं जमा कराने की वजह से आपका Attendance Block कर दिया गया है');
            } else {
                return back()->with('myerror', 'You Have No Permisison To Take Class');
            }
        } else {
            return redirect('/login');
        }
    }


    function create_file()
    {
        if (session()->has('teacher')) {
            $id = session()->get('id');
            $data1 = Student::where('id', $id)->get()->first();
            $datashow = Attendance::where('sid', $id)->orderBy('id', 'desc')->get()->take(6);
            return view('/attendancepages/create', compact('data1', 'datashow'));
        } else {
            return redirect('attendance/login');
        }
    }

    function create_submit(Request $req)
    {
        if (session()->has('teacher')) {
            $sid = $req->id;
            $cdate = date('d-M-Y');
            $data = Attendance::select('A_date', 'id')->where('sid', $sid)->orderBy('id', 'desc')->first();
            if (empty($data)) {
                $Attendance = new Attendance();
                $Attendance->sid = $req->id;
                $Attendance->A_date = $cdate;
                $Attendance->S_in = $req->time;
                $Attendance->comment = $req->comment;
                $Attendance->save();
                return  redirect('attendance/find')->with('comming', 'Thank For comming..');
            } elseif ($cdate == $data['A_date']) {
                $id = $data['id'];
                $attendance = Attendance::find($id);
                $attendance->S_out = $req->time;
                $attendance->save();
                return  redirect('attendance/find')->with('out', 'Good Bye..');
            } else {
                $Attendance = new Attendance();
                $Attendance->sid = $req->id;
                $Attendance->A_date = $cdate;
                $Attendance->S_in = $req->time;
                $Attendance->comment = $req->comment;
                $Attendance->save();
                return  redirect('attendance/find')->with('comming', 'Thank For comming..');
            }
        } else {
            return redirect('/login');
        }
    }
}