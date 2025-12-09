@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i
                                    class="fas fa-home me-1"></i>Home</a></li>
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </nav>
            </div>

            <div class="row g-4">
                <div class="col-lg-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')

                    <!-- Welcome Card -->
                    <div class="card border-0 shadow-sm mb-4"
                        style="border-radius: 12px; background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-shield-alt fa-4x text-white mb-3 opacity-75"></i>
                            <h2 class="text-white fw-bold mb-2">Welcome Admin!</h2>
                            <p class="text-white opacity-90 mb-0">Manage your job portal from this dashboard</p>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-users fa-2x"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="text-muted mb-1">Total Users</h6>
                                            <h3 class="fw-bold mb-0">{{ $totalUsers }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px; background-color: var(--primary-blue-light); color: var(--primary-blue);">
                                                <i class="fas fa-briefcase fa-2x"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="text-muted mb-1">Total Jobs</h6>
                                            <h3 class="fw-bold mb-0">{{ $totalJobs }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px;">
                                                <i class="fas fa-file-alt fa-2x"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="text-muted mb-1">Applications</h6>
                                            <h3 class="fw-bold mb-0">{{ $totalApplicants }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
@endsection
