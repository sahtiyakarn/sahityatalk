@extends('attendancepages.base')

@section('page-body')
    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {{ Session::get('msg') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4 class="text-center">Your Attendance</h4>
                    </div>
                    <div class="card-body">
                        <form action="/attendance/create_submit" method="post">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 text-right">
                                        <img src="{{ asset('photo/' . $data1->photo) }}" alt="{{ $data1->photo }}"
                                            style="width: 60px;">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <input type="text" value="{{ $data1->id }}" name="id"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4"><input type="text" value="{{ $data1->reg }}" name="reg"
                                                    class="form-control"></div>
                                            <div class="col-md-4"><input type="text" value="{{ $data1->time }}"
                                                    name="btime" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <input type="text" value="{{ $data1->course }}" name="course"
                                                    class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6"><input type="text" value="{{ $data1->name }}" name="name"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6"><input type="text" value="{{ $data1->guardian }}"
                                            name="guardian" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6"><input type="text" name="date"
                                            value="{{ $cdate = date('d-M-Y') }}" class="form-control"></div>
                                    <div class="col-md-6"><input type="text" name="time"
                                            value="{{ $ctime = date('h:i:s A') }}" class="form-control"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <input type="text" name="comment" class="form-control" autofocus>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">
                        List of Attendance
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>id</td>
                                <td>A_date</td>
                                <td>S_in</td>
                                <td>S_out</td>
                                <td>Comment</td>
                            </tr>
                            @foreach ($datashow as $row)
                                <tr>
                                    <td>{{ $row['id'] }}</td>
                                    <td>{{ $row['A_date'] }}</td>
                                    <td>{{ $row['S_in'] }}</td>
                                    <td>{{ $row['S_out'] }}</td>
                                    <td>{{ $row['comment'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <br>

@stop
