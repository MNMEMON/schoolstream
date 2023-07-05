@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('body_class')
register-page
@endsection

@section('content')
<div class="register-box">
    <div class="card card-outline my-4 card-primary">
        <div class="card-header text-center">
            <a href="{{ GetSettings('dashboard_url') }}" class="h3"><b>{{ GetSettings('site_name') }}</b></a>
            <p class="login-box-msg p-0 mt-2">Register new account</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" id="submitForm">
                @csrf
                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Full name" noSpace="true" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" noSpace="true" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" email="true" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Phone Number" required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="dob" placeholder="Date Of Birth" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('dob') }}" required id="dob" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" {{ old('terms') ? 'checked' : '' }} required>
                        <label for="agreeTerms" class="text-mode">
                            I agree to the terms
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-2 theme-btn">Register</button>
            </form>
            <small class="m-0 text-mode">already have an account? <a href="{{ route('login') }}" class="text-theme">Login</a></small>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
@endsection


@section('scripts')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
{{-- Date Picker --}}
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'yyyy-MM-DD',
    });

    // Initialize Select2 Elements
    $('.account_type_id').select2({
        theme: 'bootstrap4'
    });
    $('.country').select2({
        theme: 'bootstrap4'
    });
</script>
@endsection
