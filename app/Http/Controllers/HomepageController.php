<?php

namespace App\Http\Controllers;

use App\Models\Emessage;
use Illuminate\Http\Request;
use App\Models\Enquiry_form;
use App\Models\Inform;
use App\Models\Course;
use App\Models\Student;
use App\Http\Controllers\Session;
use App\Models\Marksheet;
use Illuminate\Mail\Markdown;

class HomepageController extends Controller
{
    public function index()
    {
        $dataExam = Inform::where('i_type', 'Exam')->orderby('id', 'desc')->first();
        $dataHoliday = Inform::where('i_type', 'Holiday')->orderby('id', 'desc')->first();
        return view('/homepages.index', compact('dataExam', 'dataHoliday'));
    }
    public function enquiryadd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobileno' => 'required',
        ]);

        $enquiry_form = new Enquiry_form();
        $enquiry_form->course = $request->course;
        $enquiry_form->name = $request->name;
        $enquiry_form->mobileno = $request->mobileno;
        $enquiry_form->info = $request->info;

        $field = array(
            "route" => "v3",
            "sender_id" => "TXTIND",
            "message_text" => "Thank you for your interest in our Course. We will respond you as soon as possible from Lal Bahadur Shastri Training Centre vikas nagar www.sahityatalk.co.in 9136157744",
            "language" => "english",
            "flash" => 0,
            "numbers" => $request->mobileno,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
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
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $enquiry_form->save();
            return redirect('/index');
        }
    }

    public function aboutus()
    {
        return view('/homepages.aboutus');
    }

    public function mycourse()
    {
        $data = Course::where('c_type', 'Computer')->get();
        return view('/homepages.course', compact('data'));
    }

    public function contactus()
    {
        return view('/homepages.contactus');
    }

    public function emessage_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'msg' => 'required'
        ]);

        $mobile = $request->mobile;

        $emessage = new Emessage();
        $emessage->name = $request->name;
        $emessage->mobile = $mobile;
        $emessage->msg = $request->msg;
        $emessage->subject = $request->subject;

        $field = array(
            "route" => "v3",
            "sender_id" => "TXTIND",
            "message_text" => "Thank you for Sending me Message. We will respond you as soon as possible from Lal Bahadur Shastri Training Centre vikas nagar www.sahityatalk.co.in 9136157744",
            "language" => "english",
            "flash" => 0,
            "numbers" => $mobile,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
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
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $emessage->save();
            return back();
        }
        //end sms
    }
    public function emarksheet_find()
    {
        return view('/homepages.emarksheet_find');
    }
    public function emarksheet_find_submit(Request $request)
    {
        $id = $request->input('id');
        $data = Student::find($id);
        $mobile = $data->phone;

        $otp = (rand(1111, 9999));
        $request->session()->put(['otp' => $otp, 'id' => $id]);

        $field = array(
            "route" => "dlt",
            "sender_id" => "satalk",
            "message" => "111628",
            "variables_values" => $otp,
            "flash" => 0,
            "numbers" => $mobile,
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
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
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return redirect('/emarksheet_otp');
        }
        //end sms
    }
    public function emarksheet_otp(Request $request)
    {
        if (session()->has('id')) {
            return view('/homepages.emarksheet_otp');
        } else {
            return redirect("/emarksheet_find");
        }
    }
    public function emarksheet_otp_submit(Request $request)
    {
        if (session()->has('id')) {
            $otp = $request->session()->get('otp');
            $otp1 = $request->otp;
            if ($otp == $otp1) {
                return redirect('/marksheet_show');
            } else {
                return redirect('/emarksheet_find');
            }
        } else {
            return redirect("/emarksheet_find");
        }
    }

    public function marksheet_show(Request $request)
    {
        if (session()->has('id')) {
            $i = 1;
            $sid = $request->session()->get('id');
            $data = Marksheet::where('sid', $sid)->orderby('id', 'asc')->get();
            $data1 = Student::find($sid);
            return view('/homepages.emarksheet', compact('data', 'data1', 'i'));
        } else {
            return redirect("/emarksheet_find");
        }
    }
}