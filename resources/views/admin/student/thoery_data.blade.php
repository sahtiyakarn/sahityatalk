@extends('admin.base')
@section('title', 'Thoery Data')

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
                    [0, "asc"]
                ],
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // dom: 'frtipB',
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
                    <form action="/admissionshow" method="post">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="find" class="form-control form-control-sm">
                                        @foreach ($time as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"><button type="submit" class="btn btn-primary btn-sm">Find
                                        Batch</button>
                                </div>
                                <div class=" col-md-2 text-center">
                                    <h5>Total Student : {{ $datacount }}</h5>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm"
                            style="font-family: times new roman; font-size:17px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>SID</th>
                                    <th>Name_of_Stu</th>
                                    <th>Question1</th>
                                    <th>Answer1</th>
                                    <th>Question2</th>
                                    <th>Answer2</th>
                                    <th>Question3</th>
                                    <th>Answer3</th>
                                    <th>Question4</th>
                                    <th>Answer4</th>
                                    <th>Question5</th>
                                    <th>Answer6</th>
                                    <th>Question7</th>
                                    <th>Answer7</th>
                                    <th>Question8</th>
                                    <th>Answer8</th>
                                    <th>Question9</th>
                                    <th>Answer9</th>
                                    <th>Question10</th>
                                    <th>Answer10</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['time'] }}</td>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['reg'] }}</td>

                                        <td>{{ $item['name'] }}</td>
                                        <td>

                                            <img src="{{ asset('photo/' . $item['photo']) }}"
                                                alt="{{ $item['photo'] }}" style="width:40px;" />

                                        </td>
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
                                        <td>{{ $item['doa'] }}</td>
                                        <td>{{ $item['setno'] }}</td>
                                        <td>{{ $item['phone'] }}</td>
                                        <td>{{ $item['fee'] }}</td>
                                        <td>{{ $item['guardian'] }}</td>
                                        <td>{{ $item['dob'] }}</td>
                                        <td> <a href="/admissionedit/{{ $item->id }}" class="btn btn-warning btn-sm"
                                                target="_blank">edit</a>
                                            <a href="/feeshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-primary">fee</a>
                                            <a href="/attendanceshowwithid/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-success">Atten</a>
                                            <a href="/admissionphoto/{{ $item->id }}" target="_blank"
                                                class="btn btn-sm btn-info">photo</a>
                                        </td>
                                        <td>{{ $item['qualification'] }}</td>
                                        <td>{{ $item['mother'] }}</td>
                                        <td>{{ $item['phone1'] }}</td>
                                        <td>{{ $item['address'] }}</td>


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
