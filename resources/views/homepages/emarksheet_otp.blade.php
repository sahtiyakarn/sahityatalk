@extends('/homepages.base')

@section('pagebody')
    <div style="height: 120px;"></div>
    <form action="/emarksheet_otp_submit" method="post">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Enter your Otp For Showing Your Marksheet</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="number" class="form-control" name="otp" id="otp" aria-describedby="helpId"
                                    placeholder="">

                            </div>
                        </div>
                        <div class="card-footer text-muted text-right">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
