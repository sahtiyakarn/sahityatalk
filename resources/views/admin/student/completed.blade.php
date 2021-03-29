@extends('admin.base')
@section('title', 'All Student')

@section('customcss')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .dt-buttons {
            /* margin-bottom: -7px; */
            position: absolute;
            bottom: 0;
            left: 50;
            right: 0;
            text-align: center;
        }

    </style>
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
                    [18, "desc"]
                ],
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>reg</th>
                                    <th>Date_of_Bir</th>
                                    <th>Name_of_Stude</th>
                                    <th>father_and_husband</th>
                                    <th>mother</th>
                                    <th>COURSE</th>
                                    <th>Bat_time</th>
                                    <th>cmt</th>
                                    <th>Atd</th>
                                    <th>Acti</th>
                                    <th>FEE</th>
                                    <th>qualifica.</th>
                                    <th>phone</th>
                                    <th>a</th>
                                    <th>address</th>
                                    <th>dob</th>
                                    <th>photo</th>
                                    <th>created_at</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['reg'] }}</td>
                                        <td>{{ $item['doa'] }}</td>
                                        <td> {{ $item['name'] }}</td>
                                        <td>{{ $item['guardian'] }}</td>
                                        <td>{{ $item['mother'] }}</td>
                                        @php
                                            $text = $item['course'];
                                            preg_match('#\((.*?)\)#', $text, $match);
                                            $doc_numn2 = isset($match[1]) ? $match[1] : null;
                                        @endphp
                                        <td>
                                            @if (!empty($doc_numn2))
                                                {{ $doc_numn2 }}
                                            @else
                                                {{ $item['course'] }}
                                            @endif
                                        </td>
                                        <td>{{ $item['time'] }}</td>

                                        <td>{{ $item['comment'] }}</td>
                                        <td>{{ $item['attendance'] }}</td>
                                        <td>{{ $item['active'] }}</td>
                                        <td>{{ $item['fee'] }}</td>
                                        <td>{{ $item['qualification'] }}</td>
                                        <td>{{ $item['phone'] }},{{ $item['phone2'] }}</td>
                                        <td> <a href="/admissionedit/{{ $item->id }}" class="btn btn-warning btn-sm"
                                                target="_blank">edit</a>
                                            <a href="/feeshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-primary">fee</a>
                                            <a href="/attendanceshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-success">Atten</a>
                                            <a href="/admissionphoto/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-info">photo</a>
                                        </td>

                                        <td>{{ $item['address'] }}</td>
                                        <td>{{ $item['dob'] }}</td>


                                        <td><img src="{{ asset('photo/' . $item['photo']) }}"
                                                alt="{{ $item['photo'] }}" style="width:50px; z-index:1000" /></td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
