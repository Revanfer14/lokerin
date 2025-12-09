@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="card border-0 shadow-lg" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-user-plus fa-4x text-primary"></i>
                                </div>
                                <h2 class="fw-bold mb-2">Create Account</h2>
                                <p class="text-muted">Join Lokerin today</p>
                            </div>

                            <form action="" name="registrationForm" id="registrationForm">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" name="name" id="name"
                                            class="form-control border-start-0" placeholder="Enter your full name">
                                    </div>
                                    <p class="text-danger small mt-1"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="text" name="email" id="email"
                                            class="form-control border-start-0" placeholder="example@example.com">
                                    </div>
                                    <p class="text-danger small mt-1"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" name="password" id="password"
                                            class="form-control border-start-0" placeholder="Create a password">
                                    </div>
                                    <p class="text-danger small mt-1"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label fw-semibold">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control border-start-0" placeholder="Confirm your password">
                                    </div>
                                    <p class="text-danger small mt-1"></p>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </button>

                                <div class="text-center">
                                    <span class="text-muted small">Already have an account? </span>
                                    <a href="{{ route('account.login') }}"
                                        class="text-primary fw-semibold text-decoration-none small">
                                        Sign In
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $("#registrationForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.processRegistration') }}',
                type: 'post',
                data: $("#registrationForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.name) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.password) {
                            $("#password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.password)
                        } else {
                            $("#password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.confirm_password) {
                            $("#confirm_password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.confirm_password)
                        } else {
                            $("#confirm_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    } else {
                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#password").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#confirm_password").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        window.location.href = '{{ route('account.login') }}';
                    }
                }
            });
        });
    </script>
@endsection
