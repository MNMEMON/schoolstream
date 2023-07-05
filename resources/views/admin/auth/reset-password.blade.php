@extends('layouts.app')

@section('styles')
@endsection

@section('body_class')
    login-page
@endsection

@section('content')

<div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ GetSettings('dashboard_url') }}" class="h3"><b>{{ GetSettings('site_name') }}</b></a>
                <p class="login-box-msg p-0 mt-2">Reset Password</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.store') }}" id="submitForm">
                    <input type="hidden" name="email" value="{{ $request->route('email') }}">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="New Password" name="password"
                            value="{{ old('password') }}" {{-- required --}} />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm New Password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" {{-- required --}} />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-2 theme-btn">Change Password</button>
                </form>
                <small class="m-0 text-mode d-block"><a href="{{ route('login') }}" class="text-theme">Login</a></small>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>

@endsection

@section('scripts')
    <script>
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
