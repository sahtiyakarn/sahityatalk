@extends('admin.base')
@section('title', 'Update Photo')
@section('customcss')
@endsection
@section('customjs')
@endsection
@section('customjq')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Header
                    </div>
                    <div class="card-body">
                        <form action="/admissionphotoupload" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Student id</label>
                                    <input type="text" name="id" id="" class="form-control" readonly
                                        value="{{ $data->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Student name</label>
                                    <input type="text" name="name" id="" class="form-control" readonly
                                        value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Upload File</label>
                                    <input type="file" name="image" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <input type="submit" class="btn btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
