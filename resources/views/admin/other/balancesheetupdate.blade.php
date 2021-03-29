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
            <div class="col-lg-5 offset-lg-2 pt-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Balance sheet</h3>
                    </div>
                    <div class="card-body">

                        <form action="/balancesheetupdatesave" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" value="{{ $id }}">
                            </div>
                            <div class="form-group">
                                <label for="">Month Name</label>
                                <input type="text" class="form-control" name="month" data-target="#month"
                                    data-toggle="datetimepicker" aria-describedby="helpId" value="{{ $month }}"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Income</label>
                                <input type="text" class="form-control" name="income" id="" aria-describedby="helpId"
                                    placeholder="" value="{{ $income }}">
                            </div>
                            <div class="form-group">
                                <label for="">expenses</label>
                                <input type="text" class="form-control" name="expense" id="" aria-describedby="helpId"
                                    placeholder="" value="{{ $expense }}">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
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
@endsection
