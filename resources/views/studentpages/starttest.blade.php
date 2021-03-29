@extends('studentpages.base')
@section('customjs')
    <script>
        function preventBack() {
            window.history.forward();
        }
        window.onunload = function() {
            null;
        };
        setTimeout("preventBack()", 0);

    </script>
@endsection
@section('page-body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <form action="ansCheck" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ strtoupper($data->paper) }}</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $i }} - {{ $data->question }}</h4>
                            <hr class="mt-5">
                            <p class="card-text"><input type="radio" name="opt" value="a"> {{ $data->a }}</p>
                            <p class="card-text"><input type="radio" name="opt" value="b"> {{ $data->b }}</p>
                            <p class="card-text"><input type="radio" name="opt" value="c"> {{ $data->c }}</p>
                            <p class="card-text"><input type="radio" name="opt" value="d"> {{ $data->d }}</p>
                            <p class="card-text">
                                <input type="hidden" class="form-control" name="ans" value="{{ $data->ans }}">
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
