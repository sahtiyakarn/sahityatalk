@extends('studentpages.base')
@section('customjs')

@endsection
@section('page-body')
    <form action="/thoery_test_update_submit" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question1) }}">-{{ ucwords($data->question1) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question1" value="{{ ucwords($data->question1) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer1" cols="68" rows="3">{{ $data->answer1 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question2) }}">-{{ ucwords($data->question2) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question2" value="{{ ucwords($data->question2) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer2" cols="68" rows="3">{{ $data->answer2 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question3) }}">-{{ ucwords($data->question3) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question3" value="{{ ucwords($data->question3) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer3" cols="68" rows="3">{{ $data->answer3 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question4) }}">-{{ ucwords($data->question4) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question4" value="{{ ucwords($data->question4) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer4" cols="68" rows="3">{{ $data->answer4 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question5) }}">-{{ ucwords($data->question5) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question5" value="{{ ucwords($data->question5) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer5" cols="68" rows="3">{{ $data->answer5 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question6) }}">-{{ ucwords($data->question6) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question6" value="{{ ucwords($data->question6) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer6" cols="68" rows="3">{{ $data->answer6 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question7) }}">-{{ ucwords($data->question7) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question7" value="{{ ucwords($data->question7) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer7" cols="68" rows="3">{{ $data->answer7 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question8) }}">-{{ ucwords($data->question8) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question8" value="{{ ucwords($data->question8) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer8" cols="68" rows="3">{{ $data->answer8 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question9) }}">-{{ ucwords($data->question9) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question9" value="{{ ucwords($data->question9) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer9" cols="68" rows="3">{{ $data->answer9 }}</textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <label for="{{ ucwords($data->question10) }}">-{{ ucwords($data->question10) }}
                                <img src="{{ asset('assets/test_image/' . $data->image) }}" alt="{{ $data->image }}"
                                    style="width: 25px;"></label>
                            <input type="hidden" name="question10" value="{{ ucwords($data->question10) }}">
                        </div>
                        <div class="card-body">
                            <p>
                                <textarea name="answer10" cols="68" rows="3">{{ $data->answer10 }}</textarea>
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
