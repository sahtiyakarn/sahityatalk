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
                @foreach ($data as $item)
                    <div class="col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <label
                                    for="{{ ucwords($item->question) }}">{{ $q2++ }}-{{ ucwords($item->question) }}
                                    <img src="{{ asset('assets/test_image/' . $item->image) }}" alt="{{ $item->image }}"
                                        style="width: 25px;"></label>
                                <input type="hidden" name="question{{ $q++ }}"
                                    value="{{ ucwords($item->question) }}">

                                <input type="hidden" name="paper" value="{{ $paper }}">
                            </div>
                            <div class="card-body">
                                <p>
                                    <textarea name="answer{{ $a++ }}" id="" cols="68" rows="3"></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
