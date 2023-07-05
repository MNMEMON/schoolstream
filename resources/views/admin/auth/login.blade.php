@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('body_class')
    login-page
@endsection

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h3"><b>{{ GetSettings('site_title') }}</b></a>
                <p class="login-box-msg p-0 mt-2">Welcome</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" id="submitForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" {{-- email="true" required --}} />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            value="{{ old('password') }}" {{-- required --}} />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-2 theme-btn">Login</button>
                </form>
                <p class="">
                    <small class="m-0 text-mode"><a href="{{ route('password.request') }}" class="text-theme">Forgot
                            Password?</a></small>
                </p>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        // Initialize Select2 Elements
        $('.department_id').select2({
            theme: 'bootstrap4'
        });
        // Initialize Select2 Elements
        $('.user_role_id').select2({
            theme: 'bootstrap4'
        });
        $('#submitForm').validate({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
@endsection
