<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Marksheet;
// use DB;
// use App\Http\Controllers\Auth;
use App\Models\Fee;
// use App\Http\Controllers\Redirect;

class AdminStudentController extends Controller
{
    function create()
    {
        $data = Student::latest('id')->first();
        $id = $data['id'] + 1;
        $cdate = date('d-M-Y');
        $course = array(
            '', 'Advance Diploma in Computer Application(ADCA)', 'Diploma in Information Technology(DIT)', 'Diploma in Computer Application(DCA)',
            'Diploma in Multimedia & Animation(DMA)', 'Diploma in Web Designing(DWD)', 'Diploma in Computer Hardware & Networking(DCHN)', 'Diploma in Cutting & Tailoring(DCT)',
            'Diploma in Fashion Designing(DFD)', 'Diploma in Advance Fashion Technology(DAFT)', 'Certificate in Advance Computer Software(CACS)',
            'Certificate in Advance Financial Accounts(CAFA)', 'Certificate in Advance Computer Programming(CACP)', 'Certificate in Advance DeskTop Publishing(CADTP)',
            'Certificate in .Net Technology(CDNT)', 'Certificate in Advance Web Designing(CAWD)', 'Certificate in Advance Graphic Designing(CAGD)',
            'Certificate in Computer Hardware(CCH)', 'Certificate in Cutting & Tailoring(CCT)', 'English Speaking Course(ESC)',
            'MicroSoft Office', 'Tally', 'Advance MicroSoft Excel', 'C Programming', 'C++ Programming', 'Structured Query Language(SQL)', 'Visual Basic(VB)',
            'Dot Net', 'Personal Home Page(PHP) & MySQL', 'DreamWeaver', 'Flash', 'PageMaker', 'Indesign', 'Photoshop', 'CorelDraw', 'Illustrator', 'After Effect',
            '3D Max', 'AutoCad', 'HTML DHTML & CSS', 'Internet', 'Mehandi', 'Nursery Teacher Training(NTT)', 'Primary Teacher Training(PTT)',
            'Nursery Primary Teacher Training(NPTT)', 'NIOS', 'Typing', 'Course on Computer Concept(CCC)', 'ip', 'Course on Computer Concept(CCC)', 'Graducation', 'Post Graducation'
        );

        $time = array('', '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM');

        $fee = array('', '500', '600', '700', '800', '900', '1000', '1500', '2000', '2500', '3000', '3500', '5000', '5500', '6000');
        $qualification = array('', '< 8th Class', '9th Class', '10th Class', '12th Class', 'Graduation', 'P.G.');
        $comment = array('ID', 'Missing', 'Completed', 'Fee No', 'Bad', 'Transfer', 'Leave', 'Leave For 10 Days', 'Leave for 15 Days', 'Leave For 30 days');

        return view('/admin/student/create', ['id' => $id, 'cdate' => $cdate, 'course' => $course, 'time' => $time, 'fee' => $fee, 'qualification' => $qualification, 'comment' => $comment]);
    }

    function admissionAdd(Request $request)
    {
        $DOA = $request->doa;
        $rest = substr($DOA, 0, 2);
        if ($rest <= 10) {
            $setno = 1;
        } elseif ($rest <= 20) {
            $setno = 2;
        } else {
            $setno = 3;
        }

        $ID = $request->id;
        $TIME = $request->time;
        $PHONE = $request->phone;

        $student = new Student;
        $student->id = $request->id;
        $student->setno = $setno;
        $student->doa = $request->doa;
        $student->reg = $request->reg;
        $student->branch = $request->branch;
        $student->course = $request->course;
        $student->time = $request->time;
        $student->name = $request->name;
        $student->guardian = $request->guardian;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->qualification = $request->qualification;
        $student->gender = $request->gender;
        $student->fee = $request->fee;
        $student->active = $request->active;
        $student->comment = $request->comment;
        $student->mother = $request->mother;
        $student->phone1 = $request->phone1;
        $student->phone = $request->phone;
        // sms send
        $field = array(
            "sender_id" => "IMPSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => $PHONE,
            "message" => "23197",
            "variables" => "{#AA#}|{#BB#}",
            "variables_values" => "$ID|$TIME"
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($field),
            CURLOPT_HTTPHEADER => array(
                "authorization: ld6rPHeb1iKcTwUM9XOFLDJjRWxv0Gtgn3IhpZQBazSACYs8kf9aWNc4PlVBrHeufDzvp1Zm37dqhOTx",
                "cache-control: no-cache",
                "accept: */*",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $student->save();
            return back()->with('success', 'Admission is Confirm');
        }
        //end sms
    }

    function admissionAll()
    {
        $data = Student::orderBy('id', 'desc')->get();
        return view('/admin/student/admissionAll', ['data' => $data]);
    }

    function admissionid()
    {
        $info = ['comment' => 'ID'];
        $data = Student::where($info)->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/admissionid', compact('data', 'datacount'));
    }
    function feeno()
    {
        $info = ['comment' => 'Fee No'];
        $data = Student::where($info)->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/feeno', compact('data', 'datacount'));
    }

    function missing()
    {
        $info = ['comment' => 'Missing'];
        $data = Student::where($info)->orderBy('id', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/missing', compact('data', 'datacount'));
    }

    function completed()
    {
        $info = ['comment' => 'Completed'];
        $data = Student::where($info)->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/completed', compact('data', 'datacount'));
    }

    function leave()
    {
        $data = Student::where(Student::raw('left(comment, 5)'), 'Leave')->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/leave', compact('data', 'datacount'));
    }
    function badtransfer()
    {
        $info = ['comment' => 'Bad', 'comment' => 'Transfer', 'comment' => 'Break'];
        $data = Student::where($info)->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/badtransfer', compact('data', 'datacount'));
    }

    function remain()
    {
        $data = Student::where('comment', '!=', 'Bad')
            ->where('comment', '!=', 'Completed')
            ->where('comment', '!=', 'Missing')
            ->where('comment', '!=', 'ID')
            ->where('comment', '!=', 'Fee No')
            ->where('comment', '!=', 'Leave')
            ->where('comment', '!=', 'Leave for 10 Days')
            ->where('comment', '!=', 'Leave for 15 Days')
            ->where('comment', '!=', 'Leave for 30 Days')
            ->where('course', '!=', 'NIOS')
            ->where('comment', '!=', 'Transfer')
            ->where('comment', '!=', 'Studing')
            ->where('comment', '!=', 'bad')
            ->where('comment', '!=', 'Break')
            ->where('comment', '!=', '')
            ->orderBy('created_at', 'desc')->get();
        $datacount = $data->count();
        return view('/admin/student/remain', compact('data', 'datacount'));
    }

    function admissionShow(Request $request)
    {
        $time = ['', '07:00 AM', '08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM'];
        $find = $request->find;
        if (!empty($find)) {

            $info = ['active' => 'Yes', 'time' => $find];
            $data = Student::where($info)->orderBy('time', 'asc')->get();
            $datacount = $data->count();
            return view('/admin/student/admissionShow', compact('data', 'datacount', 'time'));
        } else {
            $info = ['active' => 'Yes'];
            $data = Student::where($info)->orderBy('time', 'asc')->get();
            $datacount = $data->count();
            return view('/admin/student/admissionShow', compact('data', 'datacount', 'time'));
        }
    }



    function AdmissionEdit($id)
    {
        $course = array(
            'Advance Diploma in Computer Application(ADCA)', 'Diploma in Information Technology(DIT)', 'Diploma in Computer Application(DCA)',
            'Diploma in Multimedia & Animation(DMA)', 'Diploma in Web Designing(DWD)', 'Diploma in Computer Hardware & Networking(DCHN)', 'Diploma in Cutting & Tailoring(DCT)',
            'Diploma in Fashion Designing(DFD)', 'Diploma in Advance Fashion Technology(DAFT)', 'Certificate in Advance Computer Software(CACS)',
            'Certificate in Advance Financial Accounts(CAFA)', 'Certificate in Advance Computer Programming(CACP)', 'Certificate in Advance DeskTop Publishing(CADTP)',
            'Certificate in .Net Technology(CDNT)', 'Certificate in Advance Web Designing(CAWD)', 'Certificate in Advance Graphic Designing(CAGD)',
            'Certificate in Computer Hardware(CCH)', 'Certificate in Cutting & Tailoring(CCT)', 'English Speaking Course(ESC)',
            'MicroSoft Office', 'Tally', 'Advance MicroSoft Excel', 'C Programming', 'C++ Programming', 'Structured Query Language(SQL)', 'Visual Basic(VB)',
            'Dot Net', 'Personal Home Page(PHP) & MySQL', 'DreamWeaver', 'Flash', 'PageMaker', 'Indesign', 'Photoshop', 'CorelDraw', 'Illustrator', 'After Effect',
            '3D Max', 'AutoCad', 'HTML DHTML & CSS', 'Internet', 'Mehandi', 'Nursery Teacher Training(NTT)', 'Primary Teacher Training(PTT)',
            'Nursery Primary Teacher Training(NPTT)', 'NIOS', 'Typing', 'Course on Computer Concept(CCC)', 'Course on Computer Concept(CCC)', 'Graducation', 'Post Graducation'
        );

        $time = array('08:00 AM', '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM', '6:00 PM', '7:00 PM');

        $fee = array('500', '600', '700', '800', '900', '1000', '1500', '2000', '2500', '3000', '3500', '5000', '5500', '6000');
        $qualification = array('< 8th Class', '9th Class', '10th Class', '12th Class', 'Graduation', 'P.G.');
        $comment = array('Studing', 'Fee No', 'ID', 'Missing', 'Completed',  'Bad', 'Transfer', 'Break', 'Leave For 10 Days', 'Leave for 15 Days', 'Leave For 30 days');

        $data = Student::find($id);
        return view('/admin/student/admissionedit', compact('data', 'time', 'course', 'comment', 'qualification', 'fee'));
    }

    function AdmissionEditSave(Request $request)
    {
        $comment = $request->comment;
        $student = Student::find($request->id);
        // return $student->active;
        $student->doa = $request->doa;
        $student->reg = $request->reg;
        $student->branch = $request->branch;
        $student->course = $request->course;
        $student->time = $request->time;
        $student->name = $request->name;
        $student->guardian = $request->guardian;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->qualification = $request->qualification;
        $student->gender = $request->gender;
        $student->fee = $request->fee;
        $student->active = $request->active;
        $student->comment = $request->comment;
        $student->mother = $request->mother;
        $student->phone1 = $request->phone1;
        $student->phone = $request->phone;
        $student->setno = $request->setno;
        $student->save();
        return redirect()->back()->with('success', 'Admission is Updated');
    }

    function studentid(Request $request)
    {
        return view('/admin/student/studentid');
    }

    function icardadd(Request $request)
    {
        $id1 = $request->s1;
        $id2 = $request->s2;
        $id3 = $request->s3;
        $id4 = $request->s4;
        $id5 = $request->s5;
        $id6 = $request->s6;
        $id7 = $request->s7;
        $id8 = $request->s8;
        $data1 = Student::find($id1);
        $data2 = Student::find($id2);
        $data3 = Student::find($id3);
        $data4 = Student::find($id4);
        $data5 = Student::find($id5);
        $data6 = Student::find($id6);
        $data7 = Student::find($id7);
        $data8 = Student::find($id8);
        return view('/admin/student/studentid', compact('data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7', 'data8'));
    }


    function studentcover()
    {
        return view('/admin/student/studentcover');
    }

    function studentcoveradd(Request $request)
    {
        $scp1 = $request->scp1;
        $scp2 = $request->scp2;
        $scp3 = $request->scp3;
        $scp4 = $request->scp4;
        $data1 = Student::find($scp1);
        $data2 = Student::find($scp2);
        $data3 = Student::find($scp3);
        $data4 = Student::find($scp4);
        return view('/admin/student/studentcover', compact('data1', 'data2', 'data3', 'data4'));
    }

    function admissionphoto($id)
    {
        $data = Student::find($id);
        return view('/admin/student/admissionphoto', compact('data'));
    }

    function admissionphotoupload(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->id . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('photo'), $imageName);

        $student = Student::find($request->id);
        $student->photo = $imageName;
        $student->save();
        return redirect('/admissionshow');
    }

    function emarksheet()
    {
        $data = Marksheet::all();
        $cdate = date('d-M-Y');
        return view('admin.student.marksheetsheet', compact('data', 'cdate'));
    }

    function emarksheet_submit(Request $request)
    {

        $total = $request->pmark + $request->tmark;
        $student = new Marksheet;
        $student->sid = $request->sid;
        $student->edate = $request->edate;
        $student->course = $request->course;
        $student->subject = $request->subject;
        $student->pmark = $request->pmark;
        $student->tmark = $request->tmark;
        $student->total = $total;
        $student->status = $request->status;
        $student->save();
        return redirect('/emarksheet');
    }

    function emarksheet_update($id)
    {
        $cdate = date('d-M-Y');
        $data = Marksheet::find($id);
        return view('/admin.student.marksheet_update', compact('data', 'cdate'));
    }
    function emarksheet_update_submit(Request $request)
    {

        $student = Marksheet::find($request->id);
        $student->edate = $request->edate;
        $student->course = $request->course;
        $student->subject = $request->subject;
        $student->pmark = $request->pmark;
        $student->tmark = $request->tmark;
        $student->total = $request->tmark + $request->pmark;
        $student->status = $request->status;
        $student->save();
        return redirect('/emarksheet');
    }

    function emarksheet_delete($id)
    {
        $res = Marksheet::where('id', $id)->delete();
        return redirect('/emarksheet');
    }
}