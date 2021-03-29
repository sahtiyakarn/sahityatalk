<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Quiz;
use App\Models\Student;
use App\Models\Utmark;
use App\Models\Teacher;
use App\Models\Fee;
use App\Models\Thoery_answer;
use App\Models\Thoery_test;

class StudentController extends Controller
{
    public function stuCheck(Request $request)
    {
        $student1 = ucwords(strtolower($request->student));
        $password = $request->password;
        $total = (strlen($password)) - (10);
        $id = substr($password, 0, $total);
        $phone = substr($password, $total);
        $data = Student::where('id', $id)->where('phone', $phone)->where('name', $student1)->first();
        if (empty($data)) {
            return back()->with('error', 'Username & Password is Wrong');
        } elseif ($data->active == 'No') {
            return back()->with('error', 'Your Have No Permission to Open Panel');
        } elseif ($data->comment == 'Fee No') {
            return back()->with('error', 'आपने Fee Last Date तक नहीं किया है इसलिए आपके Attendance को  Block कर दिया गया है कृपया अपने Institute Head से बात करे ');
        } elseif ($data->active == "Yes") {
            $request->session()->put('id', $id);
            $request->session()->put('student', $student1 . $password);
            return redirect('/student/dashboard')->with(['data' => $data]);
        } else {
            return back()->with('error', 'Username & Password is Wrong');
        }
    }

    function checkCourse(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $course1 = Student::select('course')->find($id);
            $course = $course1['course'];
            $cacs = array('', 'Paint', 'Wordpad', 'Fundamental', 'Fundamental-1', 'Word', 'Excel', 'Power Point', 'Access');
            $tally = array('', 'Tally');
            $cadtp = array('', 'Photoshop', 'Pagemaker', 'CorelDraw');
            $program = array('', 'Visual Basic', 'SQL Set', 'C & C++');
            $cawd = array('', 'HTML', 'Flash');
            $dchn = array('', 'Fundamental', 'Fundamental', 'Networking');
            if ($course == 'Certificate in Advance Computer Software(CACS)') {
                $data = $cacs;
            } elseif ($course == 'Course on Computer Concept(CCC)') {
                $data = $cacs;
            } elseif ($course == 'Certificate in Advance Financial Accounts(CAFA)') {
                $data = array_merge($cacs, $tally);
            } elseif ($course == 'Certificate in Advance DeskTop Publishing(CADTP)') {
                $data = array_merge($cacs, $cadtp);
            } elseif ($course == 'Photoshop') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Multimedia & Animation(DMA)') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Web Designing(DWD)') {
                $data = array_merge($cacs, $cadtp, $cawd);
            } elseif ($course == 'Diploma in Computer Hardware & Networking(DCHN)') {
                $data = $dchn;
            } elseif ($course == 'Certificate in Advance Graphic Designing(CAGD)') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Information Technology(DIT)') {
                $data = array_merge($cacs, $tally, $cadtp, $program);
            } elseif ($course == 'Diploma in Computer Application(DCA)') {
                $data = array_merge($cacs, $tally, $cadtp, $program, $cawd);
            } elseif ($course == 'Advance Diploma in Computer Application(ADCA)') {
                $data = array_merge($cacs, $tally, $cadtp, $program, $cawd);
            } elseif ($course == 'Tally') {
                $data = $tally;
            } elseif ($course == 'MS-Office') {
                $data = $cacs;
            } elseif ($course == 'Advance MS-Excel') {
                $data = $cacs;
            } elseif ($course == 'Certificate in Advance Web Designing(CAWD)') {
                $data = $cawd;
            } else {
                echo "<script>alert('You are Not Eligible For Exam');window.location.href='Student_Panel.php';</script>";
            }

            return view('studentpages.checkCourse')->with('data', $data);
        } else {
            return redirect('/login');
        }
    }

    function starttest(Request $request)
    {
        $i = 1;
        if (session()->has('student')) {
            $request->session()->put('sn');
            $request->session()->put('nextq', '1');
            $request->session()->put('wrongans', '0');
            $request->session()->put('rightans', '0');
            $ctime = date('d-M-Y | h:i:s A');
            $id = $request->session()->get('id');
            $paper = $request->chooseTest;
            $utmarks = new Utmark();
            $utmarks->sid = $id;
            $utmarks->paper = $paper;
            $utmarks->stime = $ctime;
            $utmarks->etime = $ctime;
            $utmarks->save();
            $course = $request->chooseTest;
            $request->session()->put('course', $course);
            $data = Quiz::where(['paper' => $course])->first();
            return view('studentpages.starttest', compact('data', 'i'));
        } else {
            return redirect('/login');
        }
        $request->session()->put('sn');
        $request->session()->put('nextq', '1');
        $request->session()->put('wrongans', '0');
        $request->session()->put('rightans', '0');
        $ctime = date('d-M-Y | h:i:s A');
        $id = $request->session()->get('id');
        $paper = $request->chooseTest;
        $utmarks = new Utmark();
        $utmarks->sid = $id;
        $utmarks->paper = $paper;
        $utmarks->stime = $ctime;
        $utmarks->etime = $ctime;
        $utmarks->save();
        $course = $request->chooseTest;
        $request->session()->put('course', $course);
        $data = Quiz::where(['paper' => $course])->first();
        return view('studentpages.starttest', compact('data',  'i'));
    }

    function ansCheck(Request $request)
    {
        if (session()->has('student')) {
            $sid = $request->session()->get('id');
            $id1 = Utmark::select('id')->where(['sid' => $sid])->orderBy('id', 'desc')->first();
            $id = $id1['id'];
            $sn = $request->session()->get('sn');
            $nextq = $request->session()->get('nextq', '1');
            $wrongans = $request->session()->get('wrongans', '0');
            $rightans = $request->session()->get('rightans', '0');
            $course = $request->session()->get('course');
            $opt = $request->opt;
            $ans = $request->ans;
            $nextq += 1;
            if ($ans === $opt) {
                $rightans += 1;
            } else {
                $wrongans += 1;
                echo ('<script>alert("Your Answer i s Wrong :")</script>');
            }
            $request->session()->put('nextq', $nextq);
            $request->session()->put('wrongans', $wrongans);
            $request->session()->put('rightans', $rightans);
            $ctime = date('d-M-Y | h:i:s A');
            $utmarks = Utmark::where('id', '=', $id)->first();;
            $utmarks->etime = $ctime;
            $utmarks->Ques = ($nextq - 1);
            $utmarks->ans = $rightans;
            $utmarks->save();
            $i = 0;
            $data1 = Quiz::where(['paper' => $course])->get();
            foreach ($data1 as $data) {
                $i++;
                if ($data1->count() < $nextq) {
                    return redirect('/student/endtest');
                }
                if ($i == $nextq) {
                    // return view('studentpages.starttest')->with(['data' => $data]);
                    return view('studentpages.starttest', compact('data', 'i'));
                }
            }
        } else {
            return redirect('/login');
        }
    }


    function endtest(Request $request)
    {
        if (session()->has('student')) {
            $nextq1 = $request->session()->get('nextq');
            $nextq = $nextq1 - 1;
            $wrongans = $request->session()->get('wrongans');
            $rightans = $request->session()->get('rightans');
            $course = $request->session()->get('course');
            return view('studentpages.endtest', compact('nextq', 'course', 'rightans', 'wrongans'));
        } else {
            return redirect('/login');
        }
    }

    public function attendancecheck(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $data = Attendance::where(['sid' => $id])->orderBy('id', 'desc')->get();
            return view('studentpages.attendancecheck', compact('data'));
        } else {
            return redirect('/login');
        }
    }
    public function feecheck(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $data = Fee::where(['sid' => $id])->orderBy('id', 'desc')->get();
            return view('studentpages.feecheck', compact('data'));
        } else {
            return redirect('/login');
        }
    }

    public function utmarkcheck(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $data = Utmark::where(['sid' => $id])->orderBy('id', 'desc')->get();
            return view('studentpages.utmarkcheck', compact('data'));
        } else {
            return redirect('/login');
        }
    }




    function theory_checkCourse(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $course1 = Student::select('course')->find($id);
            $course = $course1['course'];
            $cacs = array('', 'Paint', 'Wordpad', 'Fundamental', 'Fundamental-1', 'Word', 'Excel', 'Power Point', 'Access');
            $tally = array('', 'Tally');
            $cadtp = array('', 'Photoshop', 'Pagemaker', 'CorelDraw');
            $program = array('', 'Visual Basic', 'SQL Set', 'C & C++');
            $cawd = array('', 'HTML', 'Flash');
            $dchn = array('', 'Fundamental', 'Fundamental', 'Networking');
            if ($course == 'Certificate in Advance Computer Software(CACS)') {
                $data = $cacs;
            } elseif ($course == 'Course on Computer Concept(CCC)') {
                $data = $cacs;
            } elseif ($course == 'Certificate in Advance Financial Accounts(CAFA)') {
                $data = array_merge($cacs, $tally);
            } elseif ($course == 'Certificate in Advance DeskTop Publishing(CADTP)') {
                $data = array_merge($cacs, $cadtp);
            } elseif ($course == 'Photoshop') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Multimedia & Animation(DMA)') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Web Designing(DWD)') {
                $data = array_merge($cacs, $cadtp, $cawd);
            } elseif ($course == 'Diploma in Computer Hardware & Networking(DCHN)') {
                $data = $dchn;
            } elseif ($course == 'Certificate in Advance Graphic Designing(CAGD)') {
                $data = $cadtp;
            } elseif ($course == 'Diploma in Information Technology(DIT)') {
                $data = array_merge($cacs, $tally, $cadtp, $program);
            } elseif ($course == 'Diploma in Computer Application(DCA)') {
                $data = array_merge($cacs, $tally, $cadtp, $program, $cawd);
            } elseif ($course == 'Advance Diploma in Computer Application(ADCA)') {
                $data = array_merge($cacs, $tally, $cadtp, $program, $cawd);
            } elseif ($course == 'Tally') {
                $data = $tally;
            } elseif ($course == 'MS-Office') {
                $data = $cacs;
            } elseif ($course == 'Advance MS-Excel') {
                $data = $cacs;
            } elseif ($course == 'Certificate in Advance Web Designing(CAWD)') {
                $data = $cawd;
            } else {
                echo "<script>alert('You are Not Eligible For Exam');window.location.href='Student_Panel.php';</script>";
            }

            return view('studentpages.thoery_checkCourse')->with('data', $data);
        } else {
            return redirect('/login');
        }
    }

    function thoery_starttest(Request $request)
    {
        if (session()->has('student')) {
            $q = 1;
            $q1 = 1;
            $q2 = 1;
            $a = 1;
            $a1 = 1;
            $paper = $request->chooseTest;
            $data = Thoery_test::where('paper', $paper)->get();
            return view('studentpages.thoery_starttest', compact('data', 'q', 'a', 'q1', 'q2', 'a1', 'paper'));
        } else {
            return redirect('/login');
        }
    }
    public function thoery_testsubmit(Request $request)
    {
        if (session()->has('student')) {
            $id = $request->session()->get('id');
            $sname = Student::where(['id' => $id])->first();
            // return $sname->name;
            $thoery_answer = new Thoery_answer;
            $thoery_answer->sid = $id;
            $thoery_answer->name = $sname->name;
            $thoery_answer->paper = $request->paper;
            $thoery_answer->question1 = $request->question1;
            $thoery_answer->question1 = $request->question1;
            $thoery_answer->question2 = $request->question2;
            $thoery_answer->question3 = $request->question3;
            $thoery_answer->question4 = $request->question4;
            $thoery_answer->question5 = $request->question5;
            $thoery_answer->question6 = $request->question6;
            $thoery_answer->question7 = $request->question7;
            $thoery_answer->question8 = $request->question8;
            $thoery_answer->question9 = $request->question9;
            $thoery_answer->question10 = $request->question10;
            $thoery_answer->answer1 = $request->answer1;
            $thoery_answer->answer2 = $request->answer2;
            $thoery_answer->answer3 = $request->answer3;
            $thoery_answer->answer4 = $request->answer4;
            $thoery_answer->answer5 = $request->answer5;
            $thoery_answer->answer6 = $request->answer6;
            $thoery_answer->answer7 = $request->answer7;
            $thoery_answer->answer8 = $request->answer8;
            $thoery_answer->answer9 = $request->answer9;
            $thoery_answer->answer10 = $request->answer10;
            $thoery_answer->save();
            return redirect('/student/dashboard');
        } else {
            return redirect('/login');
        }
    }
}