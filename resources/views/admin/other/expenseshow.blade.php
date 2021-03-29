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

            $('#doe').datetimepicker({
                format: 'DD-MMM-y'
            });
            $('#does').datetimepicker({
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Add New
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            {!! Form::open(['method' => 'post', 'url' => 'expenseadd']) !!}
                                                            @php
                                                                $list = ['' => '', 'Sahitya' => 'Sahitya', 'Expenses' => 'Expenses', 'Tea' => 'Tea', 'Cleaner' => 'Cleaner', 'Rent' => 'Rent', 'Salary' => 'Salary', 'Nimboo' => 'Nimboo', 'head office' => 'head office'];
                                                                $cdate = date('d-M-Y');
                                                            @endphp

                                                            {!! Form::text('doe', $cdate, ['class' => 'form-control my-1 datetimepicker-input', 'id' => 'doe', 'data-toggle' => 'datetimepicker']) !!}

                                                            {!! Form::select('name', $list, '', ['class' => 'form-control']) !!}
                                                            @error('name')<span
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            {!! Form::number('price', '', ['class' => 'form-control mt-1 mb-2', 'placeholder' => 'Price']) !!}
                                                            @error('price')<span
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            {!! Form::text('other', '', ['class' => 'form-control mt-1', 'placeholder' => 'Name of the expenses']) !!}
                                                            @error('other')<span
                                                                    class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            {!! Form::submit('submit', ['class' => 'btn btn-info ml-2']) !!}

                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="/expensesshowwithdate" method="post" class="">
                                            @csrf

                                            @php
                                                $last = date('Y') - 4;
                                                $now = date('Y');
                                                $year = ['2020', '2019', '2018', '2017'];
                                                $day1 = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
                                                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="day1" id="">
                                                            <option value=""></option>
                                                            @foreach ($day1 as $item)
                                                                <option value="{{ $item }}">
                                                                    {{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="months" id="">
                                                            <option value="{{ $cmm }}">{{ $cmm }}
                                                            </option>
                                                            @foreach ($months as $item)
                                                                <option value="{{ $item }}">
                                                                    {{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="year" id="">
                                                            <option value="{{ $cyy }}">
                                                                {{ $cyy }}
                                                            </option>
                                                            @foreach ($year as $item)
                                                                <option value="{{ $item }}">
                                                                    {{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        {{ $total }}
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
                                        <th>doe</th>
                                        <th>name</th>
                                        <th>Other's name</th>
                                        <th>price</th>
                                        <th>month</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->doe }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->other }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->month }}</td>
                                            <td> <a href="\expenseedit\{{ $item->id }}"
                                                    class="btn btn-info btn-sm">edit</a>
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
