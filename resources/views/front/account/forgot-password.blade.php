@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4"
                            style="border-radius: 12px; border-left: 4px solid var(--primary-blue) !important; background-color: var(--primary-blue-light); color: var(--primary-blue);">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-3 fs-4"></i>
                                <p class="mb-0">{{ Session::get('success') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4"
                            style="border-radius: 12px; border-left: 4px solid #ef4444 !important;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-3 fs-4"></i>
                                <p class="mb-0">{{ Session::get('error') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card border-0 shadow-lg" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-key fa-4x text-primary"></i>
                                </div>
                                <h2 class="fw-bold mb-2">Forgot Password?</h2>
                                <p class="text-muted">Enter your email to reset your password</p>
                            </div>

                            <form action="{{ route('account.processForgotPassword') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="text" value="{{ old('email') }}" name="email" id="email"
                                            class="form-control border-start-0 @error('email') is-invalid @enderror"
                                            placeholder="example@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                                    <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                                </button>

                                <div class="text-center">
                                    <a href="{{ route('account.login') }}"
                                        class="text-primary fw-semibold text-decoration-none small">
                                        <i class="fas fa-arrow-left me-1"></i>Back to Login
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
