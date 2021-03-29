<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        Marksheet
    </title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
        integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css1/lightbox.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/css1/lightbox-plus-jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css1/master.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css1/marksheet1.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
</head>

<body>

    <div style="height: 1500px" class="markbackground1">
        <div class="container-fluid">
            <div class="container">
                <br> <br>
                <div class="row">
                    <div class="col-sm-12 text-center text-danger">
                        <h1 style="font-family: 'Libre Baskerville', serif;">
                            <span style="font-size:38pt;">Lal Bahadur Shastri Training Centre</span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center text-info">
                        <h5>Under The Management of<br>
                            The Manav Kalyan Avom Sanstha <sup>sm</sup>
                            Regd. By Govt. of NCT of Delhi, Regn. NO. S-52500</h5>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-5 text-center text-white rounded bg-danger">
                        <h2>ISO 9001 : 2008 Certified</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
                        <h5>Branch : R-13/3 1st Floor R Block Ranhola Road Vikas Nagar Uttam Nagar New Delhi-110059
                        </h5>
                        <h5>Call Us : 9136157744, whatsup : 9599008899, Mail us : lbstc.online@gmail.com</h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
                        <img src="{{ asset('img/logocover.png') }}" alt="">
                    </div>
                </div>

                <hr size="10" color="black">

                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4 col-4 text-right">
                                <h5>ID & Reg. : </h5>
                            </div>
                            <div class="col-sm-8 col-8">
                                <h5 class="mx-auto">{{ $data1->id }} - {{ $data1->reg }}</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4 col-4 text-right">
                                <h5>Name : </h5>
                            </div>
                            <div class="col-sm-8 col-8">
                                <h5>{{ $data1->name }}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-4 text-right">
                                <h5>Name of the Father:</h5>
                            </div>
                            <div class="col-sm-8 col-8">
                                <h5>{{ $data1->guardian }}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-4 text-right">
                                <h5>Course :</h5>
                            </div>
                            <div class="col-sm-8 col-8">
                                <h5>{{ $data1->course }}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-4 text-right">
                                <h5>Branch :</h5>
                            </div>
                            <div class="col-sm-8 col-8">
                                <h5>{{ $data1->branch }}</h5>
                            </div>
                        </div>

                    </div><!--                   main div end-->
                    <div class="col-sm-3">
                        <img src="{{ asset('photo/' . $data1->photo) }}" alt="{{ asset($data1->photo) }}"
                            height="150" width="150" border="50px" class="mx-auto d-block">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-6 text-right">
                        <h5>Date of Admission:</h5>
                    </div>
                    <div class="col-sm-4 col-6">
                        <h5>{{ $data1->doa }}</h5>
                    </div>
                    <div class="col-sm-3 col-6 text-right">
                        <h6>Date of Issue:</h6>
                    </div>
                    <div class="col-sm-2 col-6">
                        <h6>
                            {{ $cdate = date('d-M-Y') }}
                        </h6>
                    </div>
                </div>
                <hr size="10" color="black">

                <div class="row justify-content-center">
                    <div class="col-sm-8 text-center">
                        <h6>Electronic Marksheet Only For View This is Not Valid Without Institution Sign. & Seal</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-1 text-center Mborder">
                        S. No.
                    </div>
                    <div class="col-sm-3 text-center Mborder">
                        Subject
                    </div>
                    <div class="col-sm-2 text-center Mborder">
                        Exam Date
                    </div>

                    <div class="col-sm-4 text-center Mborder1">
                        <div class="row">
                            <div class="col-sm-12 Mborder1">Marks OBT.</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 Mborder1">Theory Marks(75)</div>
                            <div class="col-sm-6 Mborder1">Prac. Marks(25)</div>
                        </div>
                    </div>

                    <div class="col-sm-1 text-center Mborder">
                        Total
                    </div>
                    <div class="col-sm-1 text-center Mborder">
                        Status
                    </div>
                </div>



                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-1 text-center Mborder">
                            <h6>{{ $i++ }}</h6>
                        </div>

                        <div class="col-sm-3 text-center Mborder">
                            <h6>{{ $item->subject }}</h6>
                        </div>
                        <div class="col-sm-2 text-center Mborder">
                            <h6>{{ $item->edate }}</h6>
                        </div>
                        <div class="col-sm-2 Mborder">
                            <h6>{{ $item->pmark }}</h6>
                        </div>
                        <div class="col-sm-2 Mborder">
                            <h6>{{ $item->tmark }}</h6>
                        </div>

                        <div class="col-sm-1 text-center Mborder">
                            <h6>{{ $item->total }}</h6>

                        </div>
                        <div class="col-sm-1 text-center Mborder">
                            <h6>{{ $item->status }}</h6>
                        </div>
                    @endforeach
                </div>


                <br>
                <div class="row justify-content-between">
                    <div class="col-md-2">
                        <img src="{{ asset('img/lbs-logo.png') }}" width="150" alt="om1" class="mx-auto d-block" />
                    </div>
                    <div class="col-md-5">
                        <h6 class="text-center">
                            To VERIFICATION of the INFORMATION <br> Call Us : 9136157744, whatsup : 9599008899,<br>
                            Mail us : lbstc.online@gmail.com <br>
                            https://sahityatalk.co.in/emarksheet_find
                        </h6>
                    </div>

                    <div class="col-md-3 text-right" style="">
                        <h5> Sing. of Cent.Director & Seal</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>
