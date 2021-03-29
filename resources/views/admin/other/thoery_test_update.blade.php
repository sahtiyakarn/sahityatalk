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
    <form action="/student/thoery_testsubmit" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question1) }}">-{{ ucwords($data->question1) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question" value="{{ ucwords($data->question1) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                {{-- <input type="text" name="" id=""> --}}
                                <textarea name="answer{{ $i++ }}" cols="68"
                                    rows="3">{{ $data->answer1 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
