@extends('studentpages.base')
@section('page-body')
    <div class="row justify-content-center">
        <div class="col-md-4 mt-4">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">Select Your Paper</div>
                    <div class="card-body">
                        @csrf
                        <select name="chooseTest" id="" class="form-control" required>
                            <option value="">Select Test</option>
                            @foreach ($coursedata as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
