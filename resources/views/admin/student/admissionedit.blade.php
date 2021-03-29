@extends('admin.base')
@section('title', 'Admission')
@section('customcss')

@endsection
@section('customjs')

@endsection
@section('customjq')
    <script>
        $(function() {

            $('#reservationdate').datetimepicker({
                format: 'DD-MMM-y'
            });

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Admission Form</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success" id="message_id" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="/AdmissionEditSave" method="post">
                            @csrf
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td class="text-right">ID no</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="id" value="{{ $data->id }}"
                                                    class="form-control form-control-sm">
                                                <div class="input-group-append">
                                                    <input type="text" name="branch" value="{{ $data->branch }}"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-right">Registration no</td>
                                        <td><input type="text" name="reg" class="form-control form-control-sm"
                                                value="{{ $data->reg }}"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-right">Date of Admission</td>
                                        <td>
                                            <div class="input-group date" id="doa" data-target-input="nearest">
                                                <input type="text" name="doa"
                                                    class="form-control datetimepicker-input form-control-sm"
                                                    data-target="#doa" data-toggle="datetimepicker"
                                                    value="{{ $data->doa }}" />
                                                <div class="input-group-append">
                                                    <select name="setno" class="form-control form-control-sm">
                                                        <option value="{{ $data->setno }}">{{ $data->setno }}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">Fee</td>
                                        <td>
                                            <select name="fee" class="form-control form-control-sm">
                                                <option value="{{ $data->fee }}">{{ $data->fee }}</option>
                                                @foreach ($fee as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>



                                    </tr>
                                    <tr>
                                        <td class="text-right">Course</td>
                                        <td>
                                            <select name="course" class="form-control form-control-sm">
                                                <option value="{{ $data->course }}">{{ $data->course }}</option>
                                                @foreach ($course as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-right">Time</td>
                                        <td><select name="time" class="form-control form-control-sm">
                                                <option value="{{ $data->time }}">{{ $data->time }}</option>
                                                @foreach ($time as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select></td>

                                    </tr>
                                    <tr>
                                        <td class="text-right">Name</td>
                                        <td><input type="text" name="name" value="{{ $data->name }}"
                                                class="form-control form-control-sm"></td>
                                        <td class="text-right">Guardian's Name</td>
                                        <td><input type="text" name="guardian" value="{{ $data->guardian }}"
                                                class="form-control form-control-sm"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Mother's Name</td>
                                        <td><input type="text" name="mother" value="{{ $data->mother }}"
                                                class="form-control form-control-sm"></td>

                                        <td class="text-right">Gender</td>
                                        <td><select name="gender" class="form-control form-control-sm">
                                                <option value="{{ $data->gender }}">{{ $data->gender }}</option>
                                                <option value="Male">Female</option>
                                                <option value="Female">Male</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Address</td>
                                        <td colspan="3"><input type="text" name="address" value="{{ $data->address }}"
                                                class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Phone no1</td>
                                        <td><input type="text" name="phone" value="{{ $data->phone }}"
                                                class="form-control form-control-sm"></td>
                                        <td class="text-right">Phone No2</td>
                                        <td><input type="text" name="phone1" value="{{ $data->phone1 }}"
                                                class="form-control form-control-sm"></td>
                                    </tr>


                                    <tr>
                                        <td class="text-right">Date Of Birth</td>
                                        <td>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="dob" value="{{ $data->dob }}"
                                                    class="form-control form-control-sm datetimepicker-input"
                                                    data-target="#reservationdate" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">Qualification</td>
                                        <td> <select name="qualification" class="form-control form-control-sm">
                                                <option value="{{ $data->qualification }}">{{ $data->qualification }}
                                                </option>
                                                @foreach ($qualification as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Comment</td>
                                        <td>
                                            <div class="input-group" width="50%">
                                                <select name="comment" class="form-control form-control-sm">
                                                    <option value="{{ $data->comment }}">{{ $data->comment }}
                                                    </option>
                                                    @foreach ($comment as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="input-group-append">
                                                    <select name="active" class="form-control form-control-sm">
                                                        <option value="{{ $data->active }}">{{ $data->active }}
                                                        </option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </td>
                                        <td class="text-right">
                                            <button type="submit" class="btn btn-primary">
                                                Submit </button>
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
