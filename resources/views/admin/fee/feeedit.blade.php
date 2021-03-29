@extends('admin.base')
@section('title', 'Fees')

@section('customjq')
    <script>
        $(function() {
            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'DD-MMM-y'
            });

            //Date range picker
            $('#doa').datetimepicker({
                format: 'DD-MMM-y'
            });
            setTimeout(function() {
                $("#message_id").remove();
            }, 1000);
        });

    </script>
@endsection
@section('content')
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        HEADER
                    </div>
                    <form action="/feeeditsave" method="post">
                        @csrf
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success" id="message_id" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <table class="table table-sm">
                                <tr>
                                    <td><input type="text" class="form-control " name="id" id="StudentID"
                                            placeholder="Student's ID" value="{{ isset($data->id) ? $data->id : null }}"
                                            readonly>
                                    </td>
                                    <td><input type="text" class="form-control " name="" id="" placeholder="Registration"
                                            value="{{ isset($data->reg) ? $data->reg : null }}" disabled>
                                    </td>
                                    <td><input type="text" value="{{ isset($data->time) ? $data->time : null }}"
                                            class="form-control " name="" id="" placeholder="time" disabled></td>
                                    <td><input type="text" class="form-control " name="" id="" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control " name="" id="" placeholder="Name"
                                            value="{{ isset($data->name) ? $data->name : null }}" disabled></td>
                                    <td><input type="text" value="{{ isset($data->guardian) ? $data->guardian : null }}"
                                            class="form-control " name="" id="" placeholder="Father's/ hus " disabled></td>
                                    <td><input type="text" value="{{ isset($data->course) ? $data->course : null }}"
                                            class="form-control" name="" id="" placeholder="Course " disabled></td>
                                    <td><input type="text" class="form-control " name="" id="" placeholder=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="{{ isset($data->branch) ? $data->branch : null }}"
                                            class="form-control " name="" id="" placeholder="Branch " disabled></td>
                                    <td><input type="text" value="{{ isset($data->doa) ? $data->doa : null }}"
                                            class="form-control " name="" id="" placeholder="Date of Admission" disabled>
                                    </td>
                                    <td><input type="text" value="{{ isset($data->fee) ? $data->fee : null }}"
                                            class="form-control" name="" id="" placeholder="fee " disabled></td>

                                    <td><input type="text" class="form-control " name="" id="" placeholder=""></td>
                                </tr>

                                <tr>
                                    <td>
                                        @php
                                            $cdate = date('d-M-Y');
                                        @endphp
                                        <div class="input-group date" id="doa" data-target-input="nearest">
                                            <input type="text" name="fdd" class="form-control datetimepicker-input"
                                                data-target="#doa" value="{{ $data->fdd }}" />
                                            <div class="input-group-append" data-target="#doa" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control " name="mfee" id="mfee"
                                            value="{{ $data->mfee }}" placeholder="Monthly Fee"></td>
                                    <td><input type="text" class="form-control " name="rfee" id="rfee"
                                            value="{{ $data->rfee }}" placeholder="Registration Fee"></td>
                                    <td><input type="text" class="form-control " name="bal" id="bal"
                                            value="{{ $data->bal }}" placeholder="Balance">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        @php
                                            $book = [$data->book, 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12'];
                                        @endphp
                                        <div class="form-group">
                                            <select class="form-control" name="book" id="">
                                                @foreach ($book as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control " name="bfee" id="bfee"
                                            value="{{ $data->bfee }}" placeholder="Book Fee">
                                    </td>
                                    <td> @php
                                        $exam = [$data->exam, 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'sem-1', 'sem-2', 'sem-3', 'sem-4'];
                                    @endphp
                                        <div class="form-group">
                                            <select class="form-control" name="exam" id="">

                                                @foreach ($exam as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control " name="efee" id="efee"
                                            value="{{ $data->efee }}" placeholder="Exam fees"></td>
                                </tr>

                                <tr>
                                    <td><input type="text" value="{{ $data->slipno }}" class="form-control "
                                            name="slipno" id="slipno" placeholder="Slip no"></td>
                                    <td><input type="text" class="form-control " name="cmt" id="cmt" placeholder="comment"
                                            value="{{ $data->cmt }}"></td>
                                    <td><input type="text" class="form-control " name="fid" placeholder="fid"
                                            value="{{ $fid }}" readonly></td>
                                    <td><input type="submit" class="btn btn-primary" value="Submit fee"></td>
                                </tr>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
