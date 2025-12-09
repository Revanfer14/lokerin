@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4" style="background-color: white;">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    style="color: var(--primary-blue);"><i class="fas fa-home me-1"></i>Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}"
                                    style="color: var(--primary-blue);">Users</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <div class="card border-0 shadow mb-4" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <form action="" method="post" id="userForm" name="userForm">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="icon-box me-3"
                                        style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-user-edit text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-4 mb-0" style="color: var(--text-dark); font-weight: 600;">Edit User
                                        </h3>
                                        <p class="text-muted mb-0" style="font-size: 14px;">Update user information</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold" style="color: var(--text-dark);"><i
                                            class="fas fa-user me-2" style="color: var(--primary-blue);"></i>Name<span
                                            style="color: #ef4444;">*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name"
                                        class="form-control" value="{{ $user->name }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold" style="color: var(--text-dark);"><i
                                            class="fas fa-envelope me-2" style="color: var(--primary-blue);"></i>Email<span
                                            style="color: #ef4444;">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="Enter Email"
                                        class="form-control" value="{{ $user->email }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="designation" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-briefcase me-2"
                                            style="color: var(--primary-blue);"></i>Designation</label>
                                    <input type="text" name="designation" id="designation" placeholder="Designation"
                                        class="form-control" value="{{ $user->designation }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                </div>
                                <div class="mb-4">
                                    <label for="mobile" class="form-label fw-semibold" style="color: var(--text-dark);"><i
                                            class="fas fa-phone me-2" style="color: var(--primary-blue);"></i>Mobile</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile"
                                        class="form-control" value="{{ $user->mobile }}"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                </div>
                                <div class="d-flex justify-content-end pt-3" style="border-top: 1px solid #e5e7eb;">
                                    <a href="{{ route('admin.users') }}" class="btn btn-secondary me-2"
                                        style="padding: 12px 24px; border-radius: 8px; font-weight: 600;"><i
                                            class="fas fa-arrow-left me-2"></i>Cancel</a>
                                    <button type="submit" class="btn btn-primary"
                                        style="padding: 12px 32px; border-radius: 8px; font-weight: 600;"><i
                                            class="fas fa-save me-2"></i>Update</button>
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
    <script type="text/javascript">
        $("#userForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('admin.users.update', $user->id) }}',
                type: 'put',
                dataType: 'json',
                data: $("#userForm").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('admin.users') }}";

                    } else {
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
                    }

                }
            });
        });
    </script>
@endsection
