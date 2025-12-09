<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lokerin | Find Best Jobs</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/home.css') }}" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">

                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <i class="fas fa-briefcase me-2"></i>
                    Lokerin
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <!-- Middle navigation -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs') }}">
                                <i class="fas fa-search me-1"></i> Find Jobs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.createJob') }}">
                                <i class="fas fa-plus-circle me-1"></i> Post a Job
                            </a>
                        </li>

                    </ul>

                    <!-- Right side -->
                    <div class="d-flex align-items-center gap-2">
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <a class="btn btn-outline-primary" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-user-shield me-1"></i> Admin Panel
                            </a>
                        @endif

                        @if (!Auth::check())
                            <a class="btn btn-outline-primary" href="{{ route('account.login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        @else
                            <!-- Rounded account circle -->
                            <a href="{{ route('account.profile') }}"
                                class="profile-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-user"></i>
                            </a>
                        @endif


                    </div>

                </div>
            </div>
        </nav>
    </header>

    @yield('main')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                        <i class="fas fa-camera text-primary me-2"></i>Change Profile Picture
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <form id="profilePicForm" name="profilePicForm" action="" method="post">
                        <div class="mb-4">
                            <label for="image" class="form-label">Select New Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <p class="text-danger small mt-2 mb-0" id="image-error"></p>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-1"></i> Update Picture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-top mt-auto">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="fw-bold text-primary mb-3">
                        <i class="fas fa-briefcase me-2"></i>Lokerin
                    </h5>
                    <p class="text-muted small mb-0">Find your dream job and build your career with us.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}"
                                class="text-decoration-none text-muted small"><i class="fas fa-angle-right me-1"></i>
                                Home</a></li>
                        <li class="mb-2"><a href="{{ route('jobs') }}"
                                class="text-decoration-none text-muted small"><i class="fas fa-angle-right me-1"></i>
                                Find Jobs</a></li>
                        <li class="mb-2"><a href="{{ route('account.createJob') }}"
                                class="text-decoration-none text-muted small"><i class="fas fa-angle-right me-1"></i>
                                Post a Job</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="fw-bold mb-3">Connect With Us</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="row border-top pt-3">
                <div class="col text-center">
                    <p class="text-muted small mb-0">© 2025 Lokerin. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $('.textarea').trumbowyg();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#profilePicForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('account.updateProfilePic') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image-error").html(errors.image)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}';
                    }
                }
            });
        });
    </script>

    @yield('customJs')
</body>

</html>
