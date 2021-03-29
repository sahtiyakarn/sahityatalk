@extends('studentpages.base')
@section('customcss')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('customjs')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });

    </script>
@endsection

@section('page-body')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">

                    <div class="card-body">
                        <table id="example" class="table table-bordered table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>sid</th>
                                    <th>A_date</th>
                                    <th>S_in</th>
                                    <th>S_out</th>
                                    <th>comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $item->id }}</td>
                                        <td scope="row">{{ $item->sid }}</td>
                                        <td scope="row">{{ $item->A_date }}</td>
                                        <td scope="row">{{ $item->S_in }}</td>
                                        <td scope="row">{{ $item->S_out }}</td>
                                        <td scope="row">{{ $item->comment }}</td>
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
