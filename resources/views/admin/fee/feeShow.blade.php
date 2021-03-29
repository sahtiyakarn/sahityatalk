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
                                    <div class="col-md-4">
                                        <form action="/feeFindWithID" method="post" class="">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Enter id" name="findID">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-6">
                                        <form action="/feeFindWithDate" method="post" class="">
                                            @csrf
                                            @php
                                                $last = date('Y') - 4;
                                                $now = date('Y');
                                                $year = ['2020', '2019', '2018', '2017'];
                                                $day1 = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
                                                $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="dd" id="">
                                                            <option value="{{ $cdd }}">{{ $cdd }}
                                                            </option>
                                                            <option value=""></option>
                                                            @foreach ($day1 as $item)
                                                                <option value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="mm" id="">
                                                            <option value="{{ $cmm }}">{{ $cmm }}
                                                            </option>

                                                            @foreach ($months as $item)
                                                                <option value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="yy" id="">
                                                            <option value="{{ $cyy }}">{{ $cyy }}
                                                            </option>
                                                            @foreach ($year as $item)
                                                                <option value="{{ $item }}">{{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
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
                                        <th>sid</th>
                                        <th>Reg</th>
                                        <th>Time</th>
                                        <th>name</th>
                                        <th>slipno</th>
                                        <th>fdd</th>
                                        <th>rfee</th>
                                        <th>mfee</th>
                                        <th>comment</th>
                                        <th>book</th>
                                        <th>bfee</th>
                                        <th>exam</th>
                                        <th>efee</th>
                                        <th>bal</th>
                                        <th>total</th>
                                        <th>act</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td scope="row">{{ $item->id }}</td>
                                            <td>{{ $item->sid }}</td>
                                            <td>{{ $item->reg }}</td>
                                            <td>{{ $item->time }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slipno }}</td>
                                            <td>{{ $item->fdd }}</td>
                                            <td>{{ $item->rfee }}</td>
                                            <td>{{ $item->mfee }}</td>
                                            <td>{{ $item->cmt }}</td>
                                            <td>{{ $item->book }}</td>
                                            <td>{{ $item->bfee }}</td>
                                            <td>{{ $item->exam }}</td>
                                            <td>{{ $item->efee }}</td>
                                            <td>{{ $item->bal }}</td>
                                            <td>{{ $item->subtotal }}</td>
                                            <td><a href="/feeedit/{{ $item->id }}" class="btn btn-sm btn-info">edit</a>
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
