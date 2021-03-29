@extends('admin.base')
@section('title', 'Dashboard')
@section('customcss')
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

    </script>

@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <form action="studentcoveradd" method="post">
                        @csrf
                        <input type="text" name="scp1" id="scp1" size="4">
                        <input type="text" name="scp2" id="scp2" size="4">
                        <input type="text" name="scp3" id="scp3" size="4">
                        <button type="submit " class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <input type="submit" name="hide3" value="hide3" onclick="divhide3()">
                    <input type="submit" name="hide2" value="hide2" onclick="divhide2()">
                    <input type="submit" name="hide1" value="hide1" onclick="divhide1()">
                </div>
            </div>


        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 " id="stuid1" style="border:2px solid black; height:460px;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="font-weight-bold text-danger">Lal Bahadur Shastri Training Centre

                            </h2>
                            <div class="mb-2">
                                <img src="{{ asset('img/logocover.png') }}" alt="logo" style="width: 200px">
                            </div>
                            <hr style="margin-top: 2px;  border: 1px solid red;">
                            <p class="font-weight-bold" style="margin-top: -19px">Under The Management of The manav
                                kalyan Avom Vikas Sanstha <br>
                                Regd. By Govt. of NCT of Delhi, Regn. No. S-52500 <br>
                                Address : R-13/3 1st Floor R block Main Ranholla Road Vikas Nagar New Delhi-110059 <br>
                                <span class="font-weight-bold" style="font-size: 20px">
                                    <i class="fa fa-phone" aria-hidden="true"></i>: 9136157744,
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fab fa-whatsapp-square"></i>: 9599007788,<br> <i class="fas fa-mail-bulk"></i>
                                    lbstc.online@gmail.com, &nbsp;&nbsp;&nbsp;&nbsp; Website: www.sahityatalk.co.in</span>
                                <hr style="margin-top: -15px;  border: 1px solid red;">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('photo/' . (!empty($data1->photo) ? $data1->photo : '')) }}"
                                        alt="logo" style="height: 180px;border:3px solid">
                                </div>
                                <div class="col-md-9" style="margin-top: -10px">
                                    <table class="table table-sm font-weight-bold table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td scope="row" class="text-right" width="30%">ID :</td>
                                                <td width="30%">{{ !empty($data1->id) ? $data1->id : '' }} </td>
                                                <td width="40%">Time :
                                                    {{ !empty($data1->time) ? $data1->time : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Name :</td>
                                                <td colspan="2">{{ !empty($data1->name) ? $data1->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Father's Name :</td>
                                                <td colspan="2">{{ !empty($data1->guardian) ? $data1->guardian : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Course :</td>
                                                <td colspan="2">{{ !empty($data1->course) ? $data1->course : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Branch :</td>
                                                <td colspan="2">{{ !empty($data1->branch) ? $data1->branch : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Date of Admission :</td>
                                                <td colspan="2">{{ !empty($data1->doa) ? $data1->doa : '' }}</td>
                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-1">
                <div class="col-md-10 " id="stuid2" style="border:2px solid black; height:460px;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="font-weight-bold text-danger">Lal Bahadur Shastri Training Centre

                            </h2>
                            <div class="mb-2">
                                <img src="{{ asset('img/logocover.png') }}" alt="logo" style="width: 200px">
                            </div>
                            <hr style="margin-top: 2px;  border: 1px solid red;">
                            <p class="font-weight-bold" style="margin-top: -19px">Under The Management of The manav
                                kalyan Avom Vikas Sanstha <br>
                                Regd. By Govt. of NCT of Delhi, Regn. No. S-52500 <br>
                                Address : R-13/3 1st Floor R block Main Ranholla Road Vikas Nagar New Delhi-110059 <br>
                                <span class="font-weight-bold" style="font-size: 20px">
                                    <i class="fa fa-phone" aria-hidden="true"></i>: 9136157744,
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fab fa-whatsapp-square"></i>: 9599007788,<br> <i class="fas fa-mail-bulk"></i>
                                    lbstc.online@gmail.com, &nbsp;&nbsp;&nbsp;&nbsp; Website: www.sahityatalk.co.in</span>
                                <hr style="margin-top: -15px;  border: 1px solid red;">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('photo/' . (!empty($data2->photo) ? $data2->photo : '')) }}"
                                        alt="logo" style="height: 180px;border:3px solid">
                                </div>
                                <div class="col-md-9" style="margin-top: -10px">
                                    <table class="table table-sm font-weight-bold table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td scope="row" class="text-right" width="30%">ID :</td>
                                                <td width="30%">{{ !empty($data2->id) ? $data2->id : '' }} </td>
                                                <td width="40%">Time :
                                                    {{ !empty($data2->time) ? $data2->time : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Name :</td>
                                                <td colspan="2">{{ !empty($data2->name) ? $data2->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Father's Name :</td>
                                                <td colspan="2">{{ !empty($data2->guardian) ? $data2->guardian : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Course :</td>
                                                <td colspan="2">{{ !empty($data2->course) ? $data2->course : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Branch :</td>
                                                <td colspan="2">{{ !empty($data2->branch) ? $data2->branch : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Date of Admission :</td>
                                                <td colspan="2">{{ !empty($data2->doa) ? $data2->doa : '' }}</td>
                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center mt-1">
                <div class="col-md-10 " id="stuid3" style="border:2px solid black; height:460px;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="font-weight-bold text-danger">Lal Bahadur Shastri Training Centre

                            </h2>
                            <div class="mb-2">
                                <img src="{{ asset('img/logocover.png') }}" alt="logo" style="width: 200px">
                            </div>
                            <hr style="margin-top: 2px;  border: 1px solid red;">
                            <p class="font-weight-bold" style="margin-top: -19px">Under The Management of The manav
                                kalyan Avom Vikas Sanstha <br>
                                Regd. By Govt. of NCT of Delhi, Regn. No. S-52500 <br>
                                Address : R-13/3 1st Floor R block Main Ranholla Road Vikas Nagar New Delhi-110059 <br>
                                <span class="font-weight-bold" style="font-size: 20px">
                                    <i class="fa fa-phone" aria-hidden="true"></i>: 9136157744,
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fab fa-whatsapp-square"></i>: 9599007788,<br> <i class="fas fa-mail-bulk"></i>
                                    lbstc.online@gmail.com, &nbsp;&nbsp;&nbsp;&nbsp; Website: www.sahityatalk.co.in</span>
                                <hr style="margin-top: -15px;  border: 1px solid red;">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('photo/' . (!empty($data3->photo) ? $data3->photo : '')) }}"
                                        alt="logo" style="height: 180px;border:3px solid">
                                </div>
                                <div class="col-md-9" style="margin-top: -10px">
                                    <table class="table table-sm font-weight-bold table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td scope="row" class="text-right" width="30%">ID :</td>
                                                <td width="30%">{{ !empty($data3->id) ? $data3->id : '' }} </td>
                                                <td width="40%">Time :
                                                    {{ !empty($data3->time) ? $data3->time : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Name :</td>
                                                <td colspan="2">{{ !empty($data3->name) ? $data3->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Father's Name :</td>
                                                <td colspan="2">{{ !empty($data3->guardian) ? $data3->guardian : '' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Course :</td>
                                                <td colspan="2">{{ !empty($data3->course) ? $data3->course : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Branch :</td>
                                                <td colspan="2">{{ !empty($data3->branch) ? $data3->branch : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" class="text-right">Date of Admission :</td>
                                                <td colspan="2">{{ !empty($data3->doa) ? $data3->doa : '' }}</td>
                                            </tr>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    </div>

    </div>

@endsection
