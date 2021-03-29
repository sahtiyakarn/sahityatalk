@extends('admin.base')
@section('title', 'nios show')
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>sid</th>
                                        <th>State</th>
                                        <th>IdentifyType</th>
                                        <th>IdentifyNo</th>
                                        <th>CourseAppliedFor</th>
                                        <th>MotherName</th>
                                        <th>Email</th>
                                        <th>Caste</th>
                                        <th>ExamMonth</th>
                                        <th>MediumofStudy</th>
                                        <th>YearofPassing</th>
                                        <th>Rollno</th>
                                        <th>Board</th>
                                        <th>ReferenceNo</th>
                                        <th>EnrollmentNo</th>
                                        <th>Gmail_Password</th>
                                        <th>subject</th>
                                        <th>exam</th>
                                        <th>school</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td scope="row">{{ $item->id }}</td>
                                            <td>{{ $item->sid }}</td>
                                            <td>{{ $item->State }}</td>
                                            <td>{{ $item->IdentifyType }}</td>
                                            <td>{{ $item->IdentifyNo }}</td>
                                            <td>{{ $item->CourseAppliedFor }}</td>
                                            <td>{{ $item->MotherName }}</td>
                                            <td>{{ $item->Email }}</td>
                                            <td>{{ $item->Caste }}</td>
                                            <td>{{ $item->ExamMonth }}</td>
                                            <td>{{ $item->MediumofStudy }}</td>
                                            <td>{{ $item->YearofPassing }}</td>
                                            <td>{{ $item->Rollno }}</td>
                                            <td>{{ $item->Board }}</td>
                                            <td>{{ $item->ReferenceNo }}</td>
                                            <td>{{ $item->EnrollmentNo }}</td>
                                            <td>{{ $item->Gmail_Password }}</td>
                                            <td>{{ $item->s1 . ',' . $item->s2 . ',' . $item->s3 . ',' . $item->s4 . ',' . $item->s5 . ',' . $item->s6 }}
                                            </td>
                                            <td>{{ $item->exam }}</td>
                                            <td>{{ $item->school }}</td>
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
