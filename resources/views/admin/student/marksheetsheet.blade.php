@extends('admin.base')
@section('title', 'Fee Show')
@section('customcss')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('customjs')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
@section('customjq')
    <script>
        $(function() {
            $("#example1").DataTable({
                "order": [
                    [0, "desc"]
                ],
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            });

            $('#edate').datetimepicker({
                format: 'DD-MMM-y'
            });

        });

    </script>
    <script>
        var fruit = $("[name=subject] option").detach()
        $("[name=course]").change(function() {
            var val = $(this).val()
            $("[name=subject] option").detach()
            fruit.filter("." + val).clone().appendTo("[name=subject]")
        }).change()

    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Details
                        </button>

                        <!-- Add Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/emarksheet_submit" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" id='edate' name="edate"
                                                    data-target="#edate" data-toggle="datetimepicker"
                                                    aria-describedby="helpId" value="{{ $cdate }}" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <input type="sid" class="form-control" name="sid" id="sid"
                                                    aria-describedby="helpId" placeholder="Enter Student id" value=""
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="course" id="course" required>
                                                    <option value="">select</option>
                                                    <option value="DIT">DIT</option>
                                                    <option value="DCA">DCA</option>
                                                    <option value="DWD">DWD</option>
                                                    <option value="CACS">CACS</option>
                                                    <option value="CAFA">CAFA</option>
                                                    <option value="Tally">Tally</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="subject" id="subject" required>
                                                    <option class="CACS"
                                                        value="C1-COMPUTER FUNDAMENTALS, WINDOWS & MS-OFFICE">C1-COMPUTER
                                                        FUNDAMENTALS, WINDOWS & MS-OFFICE</option>
                                                    <option class="CAFA"
                                                        value="C1-COMPUTER FUNDAMENTALS, WINDOWS & MS-OFFICE">C1-COMPUTER
                                                        FUNDAMENTALS, WINDOWS & MS-OFFICE</option>
                                                    <option class="CAFA" value="C2-TALLY ERP 9.0">C2-TALLY ERP 9.0</option>

                                                    <option class="DIT"
                                                        value="C1-COMPUTER FUNDAMENTALS, WINDOWS & MS-OFFICE">C1-COMPUTER
                                                        FUNDAMENTALS, WINDOWS & MS-OFFICE</option>
                                                    <option class="DIT" value="C2-TALLY ERP 9.0">C2-TALLY ERP 9.0</option>
                                                    <option class="DIT" value="C3-INDESIGN, CORELDRAW & PHOTOSHOP">
                                                        C3-INDESIGN, CORELDRAW & PHOTOSHOP</option>
                                                    <option class="DIT" value="C4-C & C++, VISUAL BASIC 6.0 & ORACLE">C4-C &
                                                        C++, VISUAL BASIC 6.0 & ORACLE</option>

                                                    <option class="DCA"
                                                        value="C1-COMPUTER FUNDAMENTALS, WINDOWS & MS-OFFICE">C1-COMPUTER
                                                        FUNDAMENTALS, WINDOWS & MS-OFFICE</option>
                                                    <option class="DCA" value="C2-TALLY ERP 9.0">C2-TALLY ERP 9.0</option>
                                                    <option class="DCA" value="C3-INDESIGN, CORELDRAW & PHOTOSHOP">
                                                        C3-INDESIGN, CORELDRAW & PHOTOSHOP</option>
                                                    <option class="DCA" value="C4-C & C++, VISUAL BASIC 6.0 & ORACLE">C4-C &
                                                        C++, VISUAL BASIC 6.0 & ORACLE</option>
                                                    <option class="DCA" value="C5-INTERNET, HTML, DHTML & FLASH">
                                                        C5-INTERNET, HTML, DHTML & FLASH</option>
                                                    <option class="DCA" value="C6-JAVASCRIPT, VBSCRIPT, DREAMWEAVER & ASP">
                                                        C6-JAVASCRIPT, VBSCRIPT, DREAMWEAVER & ASP</option>


                                                    <option class="DWD"
                                                        value="C1-COMPUTER FUNDAMENTALS, WINDOWS & MS-OFFICE">C1-COMPUTER
                                                        FUNDAMENTALS, WINDOWS & MS-OFFICE</option>
                                                    <option class="Tally" value="TALLY  Prime">C2-Tally Prime</option>
                                                    <option class="DWD" value="C3-INDESIGN, CORELDRAW & PHOTOSHOP">
                                                        C3-INDESIGN, CORELDRAW & PHOTOSHOP</option>
                                                    <option class="DWD" value="C5-INTERNET, HTML, DHTML & FLASH">
                                                        C5-INTERNET, HTML, DHTML & FLASH</option>
                                                    <option class="DWD" value="C6-JAVASCRIPT, VBSCRIPT, DREAMWEAVER & ASP">
                                                        C6-JAVASCRIPT, VBSCRIPT, DREAMWEAVER & ASP</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="pmark" id=""
                                                    aria-describedby="helpId" placeholder="Pratical Marks" value="">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="tmark" id="" value=""
                                                    aria-describedby="helpId" placeholder="Thoery Marks">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="status" id="">
                                                    <option>Await</option>
                                                    <option>Pass</option>
                                                    <option>Fail</option>
                                                </select>
                                            </div>
                                            <div class="mrauto">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>sid</th>
                                        <th>edate</th>
                                        <th>subject</th>
                                        <th>pmark</th>
                                        <th>tmark</th>
                                        <th>total</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->sid }}</td>
                                            <td>{{ $item->edate }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->pmark }}</td>
                                            <td>{{ $item->tmark }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td><a href="/emarksheet_update/{{ $item->id }}"
                                                    class="btn btn-info btn-sm">U</a>-
                                                <a href="/emarksheet_delete/{{ $item->id }}"
                                                    class="btn btn-danger btn-sm">D</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
