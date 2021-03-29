@extends('attendancepages.base')

@section('page-body')
    <br><br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="/attendance/find_id_check" method="post">
                    @csrf
                    <div class="card" style="box-shadow: 0px 0px 8px 0px #000;">
                        <div class="card-header">
                            <h4 class="text-center font-weight-bold">ATTENDANCE</h4>
                        </div>
                        <div class="card-body">
                            <input type="text" name="find_id" id="" class="form-control" placeholder="Enter your ID"
                                required autofocus>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"> SUBMIT </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('myerror'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ Session::get('myerror') }}
                    </div>
                @endif
                @if (Session::has('comming'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ Session::get('comming') }}
                    </div>
                @endif
                @if (Session::has('out'))
                    <div class="alert alert-warning text-center" role="alert">
                        {{ Session::get('out') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <p></p>
@stop
