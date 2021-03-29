@extends('studentpages.base')
@section('page-body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <div class="card">
                    <div class="card-header">
                        <h4>Answer</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Total Question : {{ $nextq }}</h5> <br>
                        <h5 class="card-title">Right Answer : {{ $rightans }}</h5> <br>
                        <h5 class="card-title">Wrong Answer : {{ $wrongans }}</h5> <br>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/student/dashboard" class="btn btn-primary">Back in Dashboard</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
