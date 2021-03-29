@extends('admin.base')
@section('title', 'Student id')
@section('customcss')
    <link rel="stylesheet" href="{{ asset('css/id.css') }}" type="text/css">
@endsection
@section('customjs')
@endsection
@section('customjq')
    <script type="text/javascript">
        function divhide1() {
            document.getElementById('stuid1').style.display = 'none';
        }

        function divhide2() {
            document.getElementById('stuid2').style.display = 'none';
        }

        function divhide3() {
            document.getElementById('stuid3').style.display = 'none';
        }

        function divhide4() {
            document.getElementById('stuid4').style.display = 'none';
        }

        function divhide5() {
            document.getElementById('stuid5').style.display = 'none';
        }

        function divhide6() {
            document.getElementById('stuid6').style.display = 'none';
        }

        function divhide7() {
            document.getElementById('stuid7').style.display = 'none';
        }

        function divhide8() {
            document.getElementById('stuid8').style.display = 'none';
        }

    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="/studenticard" method="post">
                            @csrf
                            <input type="text" name="s1" size="5">
                            <input type="text" name="s2" size="5">
                            <input type="text" name="s3" size="5">
                            <input type="text" name="s4" size="5">
                            <input type="text" name="s5" size="5">
                            <input type="text" name="s6" size="5">
                            <input type="text" name="s7" size="5">
                            <input type="text" name="s8" size="5">
                            <input type="Submit" name="submit" /><br>
                        </form>
                        <input type="Submit" id="submit" value="Hide1" onclick="divhide1()" />
                        <input type="Submit" id="submit" value="Hide2" onclick="divhide2()" />
                        <input type="submit" id="submit" value="Hide3" onclick="divhide3()" />
                        <input type="submit" id="submit" value="Hide4" onclick="divhide4()" />
                        <input type="submit" id="submit" value="Hide5" onclick="divhide5()" />
                        <input type="submit" id="submit" value="Hide6" onclick="divhide6()" />
                        <input type="submit" id="submit" value="Hide7" onclick="divhide7()" />
                        <input type="submit" id="submit" value="Hide8" onclick="divhide8()" />


                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid1">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data1->photo) ? $data1->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data1->id) ? $data1->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data1->name) ? $data1->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data1->guardian) ? $data1->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data1->course) ? $data1->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data1->course) ? $data1->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data1->fee) ? $data1->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data1->time) ? $data1->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data1->doa) ? $data1->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data1->address) ? substr($data1->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid2">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">
                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data2->photo) ? $data2->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data2->id) ? $data2->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data2->name) ? $data2->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data2->guardian) ? $data2->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data2->course) ? $data2->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data2->course) ? $data2->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data2->fee) ? $data2->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data2->time) ? $data2->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data2->doa) ? $data2->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data2->address) ? substr($data1->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid3">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data3->photo) ? $data3->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data3->id) ? $data3->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data3->name) ? $data3->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data3->guardian) ? $data3->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data3->course) ? $data3->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data3->course) ? $data3->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data3->fee) ? $data3->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data3->time) ? $data3->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data3->doa) ? $data3->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data3->address) ? substr($data3->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                </td>

                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid4">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data4->photo) ? $data4->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data4->id) ? $data4->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data4->name) ? $data4->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data4->guardian) ? $data4->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data4->course) ? $data4->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data4->course) ? $data4->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data4->fee) ? $data4->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data4->time) ? $data4->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data4->doa) ? $data4->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data4->address) ? substr($data4->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid5">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data5->photo) ? $data5->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data5->id) ? $data5->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data5->name) ? $data5->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data5->guardian) ? $data5->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data5->course) ? $data5->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data5->course) ? $data5->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data5->fee) ? $data5->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data5->time) ? $data5->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data5->doa) ? $data5->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data5->address) ? substr($data5->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid6">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data6->photo) ? $data6->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data6->id) ? $data6->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data6->name) ? $data6->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data6->guardian) ? $data6->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data6->course) ? $data6->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data6->course) ? $data6->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data6->fee) ? $data6->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data6->time) ? $data6->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data6->doa) ? $data6->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data6->address) ? substr($data6->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid7">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri
                                                    Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">

                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data7->photo) ? $data7->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data7->id) ? $data7->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data7->name) ? $data7->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data7->guardian) ? $data7->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data7->course) ? $data7->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data7->course) ? $data7->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data7->fee) ? $data7->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data7->time) ? $data7->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data7->doa) ? $data7->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data7->address) ? substr($data7->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="studentidmy">
                                    <div class="col-md-12 icard" id="stuid8">
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1" style=" ">
                                                <span style="font-size:28px;color:red;  ">Lal Bahadur Shastri Training
                                                    Centre</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 bg-warning font-weight-bold printcolor1">
                                                <img src="{{ asset('img/logocover.png') }}" alt="logo"
                                                    style="width: 170px;">
                                                <div class="mb-1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;text-decoration:underline">
                                                Branch Address
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center bg-primary printcolor2"
                                                style="font-size: 14px;">
                                                R-13/3, 1st Floor, R Block, Near Vikas Nagar Auto Stand Main Ranhola Road,
                                                Vikas Nagar, New Delhi-110059
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="height: 130px">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="text-center font-weight-bold mt-1">
                                                            <img src="{{ asset('photo/' . (!empty($data8->photo) ? $data8->photo : '')) }}"
                                                                style="width:80px; border:2px solid black" />
                                                            <div>ID : {{ !empty($data8->id) ? $data8->id : '' }}</div>
                                                            <div class="row">
                                                                <div class="text-right">
                                                                    <img src="{{ asset('img/sign1.png') }}"
                                                                        alt="sign-logo"
                                                                        style="width: 50px; margin-top:-80px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10 font-weight-bold myimage" style="font-size: 14px;">
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Name :</div>
                                                    <div class="col-md-8">{{ !empty($data8->name) ? $data8->name : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">F/H Name :</div>
                                                    <div class="col-md-8">
                                                        {{ !empty($data8->guardian) ? $data8->guardian : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @php
                                                        $text = !empty($data8->course) ? $data8->course : '';
                                                        $arr = explode('(', $text, 2);
                                                        $doc_numn2 = $arr[0];
                                                    @endphp
                                                    <div class="col-md-3 text-right">Course :</div>
                                                    <div class="col-md-9" style="font-size: 13px">
                                                        @if (!empty($doc_numn2))
                                                            {{ $doc_numn2 }}
                                                        @else
                                                            {{ !empty($data8->course) ? $data8->course : '' }}

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Fee :</div>
                                                    <div class="col-md-2">{{ !empty($data8->fee) ? $data8->fee : '' }}
                                                    </div>
                                                    <div class="col-md-5">Time :
                                                        {{ !empty($data8->time) ? $data8->time : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-right">Adm Date :</div>
                                                    <div class="col-md-8">{{ !empty($data8->doa) ? $data8->doa : '' }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 ml-3" style="font-size: 13px;">
                                                        Address :
                                                        {{ !empty($data8->address) ? substr($data8->address, 0, 48) : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center font-weight-bold text-info"
                                                style="font-size: 15px; border-top: 2px solid #17A2B8;">
                                                <i class="fa fa-phone-square" aria-hidden="true"></i>: 9136157744, <i
                                                    class="fab fa-whatsapp-square"></i> : 9599007788 |
                                                www.sahityatalk.co.in
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
