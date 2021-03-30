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
                    [5, "desc"]
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
                                    <th>Student_Name</th>
                                    <th>father_hus</th>
                                    <th>Date_of_Admi.</th>
                                    <th>Creted_at</th>
                                    <th>course</th>
                                    <th>commend</th>
                                    <th>phone</th>

                                    <th>FEE</th>
                                    <th>Acti</th>
                                    <th>Batch_time</th>

                                    <th>a</th>
                                    <th>mother</th>
                                    <th>address</th>
                                    <th>dob</th>
                                    <th>qualification</th>


                                    <th>branch</th>
                                    <th>gender</th>
                                    <th>photo</th>
                                    <th>phone2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['reg'] }}</td>

                                        <td>
                                            <style>
                                                .hiddenimg {
                                                    display: none;
                                                }

                                                .hiddentxt:hover~.hiddenimg {
                                                    display: block;
                                                }

                                                .hiddenclickimg {
                                                    display: none;
                                                }

                                            </style>
                                            <span class="hiddentxt" style="cursor: pointer;">
                                                {{ $item['name'] }}
                                            </span>
                                            <span class="hiddenimg"><img src="{{ asset('photo/' . $item['photo']) }}"
                                                    alt="{{ $item['photo'] }}" style="width:50px;" /></span>
                                        </td>
                                        <td>{{ $item['guardian'] }}</td>
                                        <td>{{ $item['doa'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
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
                                        <td>{{ substr($item['comment'], 0, 9) }}</td>
                                        <td>{{ $item['phone'] }}</td>
                                        <td>{{ $item['fee'] }}</td>
                                        <td>{{ $item['active'] }}</td>
                                        <td>{{ $item['time'] }}</td>
                                        <td> <a href="/admissionedit/{{ $item->id }}" class="btn btn-warning btn-sm"
                                                target="_blank">edit</a>
                                            <a href="/feeshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-primary">fee</a>
                                            <a href="/attendanceshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-success">Atten</a>
                                            <a href="/admissionphoto/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-info">photo</a>
                                        </td>
                                        <td>{{ $item['mother'] }}</td>
                                        <td>{{ $item['address'] }}</td>
                                        <td>{{ $item['dob'] }}</td>
                                        <td>{{ $item['qualification'] }}</td>


                                        <td>{{ $item['branch'] }}</td>
                                        <td>{{ $item['gender'] }}</td>
                                        <td><img src="{{ asset('photo/' . $item['photo']) }}"
                                                alt="{{ $item['photo'] }}" style="width:50px; z-index:1000" /></td>
                                        <td>{{ $item['phone1'] }}</td>

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
