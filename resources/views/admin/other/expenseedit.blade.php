@extends('admin.base')
@section('title', 'Dashboard')
@section('customcss')
@endsection
@section('customjs')
@endsection
@section('customjq')
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-rc
        </div>
    </footer>
    <script>
        $(function() {
            $('#doe').datetimepicker({
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
                        <h1>Expenses Details</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if (Session::has('success'))
                                <div class="col-md-12 bg-success" id="message_id">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="col-md-12">
                                {!! Form::open(['method' => 'post', 'url' => 'expenseeditsave']) !!}
                                @php
                                    $list = ['' => '', 'Tea' => 'Tea', 'Stationery' => 'Stationery', 'Cleaner' => 'Cleaner', 'Rent' => 'Rent', 'Salary' => 'Salary', 'Sahitya' => 'Sahitya', 'Nimboo' => 'Nimboo', 'Lunch' => 'Lunch', 'Expenses' => 'Expenses'];
                                    $cdate = date('d-M-Y');
                                @endphp
                                <div class="row">
                                    <div class="col-md-2">
                                        {!! Form::text('id', $data1->id, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                                        @error('price')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::text('doe', $data1->doe, ['class' => 'form-control datetimepicker-input', 'id' => 'doe', 'data-toggle' => 'datetimepicker']) !!}

                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::select('name', $list, $data1->name, ['class' => 'form-control']) !!}
                                        @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::text('other', $data1->other, ['class' => 'form-control', 'placeholder' => 'other']) !!}
                                        @error('price')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::text('price', $data1->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                                        @error('price')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        {!! Form::submit('submit', ['class' => 'btn btn-info ml-2']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>


                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
