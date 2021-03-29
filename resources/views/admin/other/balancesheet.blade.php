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

            $('#month').datetimepicker({
                format: 'DD-MMM-y'
            });


            $('#month1').datetimepicker({
                format: 'DD-MMM-y'
            });
        });

    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        header
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
                                        <form action="/balancesheetadd" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" id='month' name="month"
                                                    data-target="#month" data-toggle="datetimepicker"
                                                    aria-describedby="helpId" value="{{ $cdate }}" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="income" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $income }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="expense" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $expense }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="totalincome" id=""
                                                    value="{{ $totalincome }}" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="mrauto">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Update Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update Balance Sheet</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @php
                                        $cdate = date('d-m-Y');
                                    @endphp
                                    <div class="modal-body">
                                        <form action="/balancesheetupdatesave" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" id='month1' name="month1"
                                                    data-target="#month1" data-toggle="datetimepicker"
                                                    aria-describedby="helpId" value="{{ !empty($month) ? $month : '' }}"
                                                    placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="income1" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $income }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="expense1" id=""
                                                    aria-describedby="helpId" placeholder="" value="{{ $expense }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="totalincome" id=""
                                                    value="{{ $totalincome }}" aria-describedby="helpId" placeholder="">
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
                                        <th>Month</th>
                                        <th>Income</th>
                                        <th>expense</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->month }}</td>
                                            <td>{{ $item->income }}</td>
                                            <td>{{ $item->expense }}</td>
                                            <td>{{ $item->balance }}</td>
                                            <td><a href="/balancesheetupdate/{{ $item->id }}/{{ $item->month }}"
                                                    data-toggle="modal1" data-target="#exampleModal11"
                                                    class="btn btn-info btn-sm">update</a>
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
