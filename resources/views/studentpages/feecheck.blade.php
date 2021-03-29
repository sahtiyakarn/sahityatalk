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
                                    <th>fdd</th>
                                    <th>rfee</th>
                                    <th>mfee</th>
                                    <th>slipno </th>
                                    <th>Exam</th>
                                    <th>Book</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $item->id }}</td>
                                        <td scope="row">{{ $item->sid }}</td>
                                        <td scope="row">{{ $item->fdd }}</td>
                                        <td scope="row">{{ $item->rfee }}</td>
                                        <td scope="row">{{ $item->mfee }}</td>
                                        <td scope="row">{{ $item->slipno }}</td>
                                        <td scope="row">{{ $item->exam }}_{{ $item->efee }}</td>
                                        <td scope="row">{{ $item->book }}_{{ $item->bfee }}</td>
                                        <td scope="row">{{ $item->subtotal }}</td>
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
