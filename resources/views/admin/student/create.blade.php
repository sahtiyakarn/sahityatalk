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
                        <form action="/admissionAdd" method="post">
                            @csrf
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td class="text-right">ID no</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="id" value="{{ $id }}"
                                                    class="form-control form-control-sm">
                                                <div class="input-group-append">
                                                    <input type="text" name="branch" value="LBSTC/DL/083/VIKAS NAGAR"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-right">Registration no.</td>
                                        <td><input type="text" name="reg" class="form-control form-control-sm"></td>

                                    </tr>
                                    <tr>
                                        <td class="text-right">Date of Admission</td>
                                        <td>
                                            <div class="input-group date" id="doa" data-target-input="nearest">
                                                <input type="text" name="doa"
                                                    class="form-control datetimepicker-input form-control-sm"
                                                    data-target="#doa" value="{{ $cdate }}" />
                                                <div class="input-group-append" data-target="#doa"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">Fee</td>
                                        <td>
                                            <select name="fee" class="form-control form-control-sm" required>
                                                @foreach ($fee as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>



                                    </tr>
                                    <tr>
                                        <td class="text-right">Course</td>
                                        <td>
                                            <select name="course" class="form-control form-control-sm" required>
                                                @foreach ($course as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-right">Time</td>
                                        <td><select name="time" class="form-control form-control-sm" required>
                                                @foreach ($time as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select></td>

                                    </tr>
                                    <tr>
                                        <td class="text-right">Name</td>
                                        <td><input type="text" name="name" class="form-control form-control-sm" required>
                                        </td>
                                        <td class="text-right">Guardian's Name</td>
                                        <td><input type="text" name="guardian" class="form-control form-control-sm"
                                                required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Mother's Name</td>
                                        <td><input type="text" name="mother" class="form-control form-control-sm"></td>

                                        <td class="text-right">Gender</td>
                                        <td><select name="gender" class="form-control form-control-sm" required>
                                                <option value="Male">Female</option>
                                                <option value="Female">Male</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Address</td>
                                        <td colspan="3"><input type="text" name="address"
                                                class="form-control form-control-sm" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Phone no1</td>
                                        <td><input type="text" name="phone" class="form-control form-control-sm" required>
                                        </td>
                                        <td class="text-right">Phone No2</td>
                                        <td><input type="text" name="phone1" class="form-control form-control-sm"></td>
                                    </tr>


                                    <tr>
                                        <td class="text-right">Date Of Birth</td>
                                        <td>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="dob"
                                                    class="form-control form-control-sm datetimepicker-input"
                                                    data-target="#reservationdate" required />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">Qualification</td>
                                        <td> <select name="qualification" class="form-control form-control-sm" required>
                                                @foreach ($qualification as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Active</td>
                                        <td>
                                            <div class="input-group">
                                                <select name="active" class="form-control form-control-sm">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <div class="input-group-append">

                                                    <select name="setno" class="form-control form-control-sm">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </td>
                                        <td class="text-right">Comment</td>
                                        <td> <select name="comment" class="form-control form-control-sm">
                                                @foreach ($comment as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> <button type="submit" class="btn btn-primary">
                                                Submit </button>
                                        </td>
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
