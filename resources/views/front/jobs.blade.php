@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">
                        <i class="fas fa-search text-primary me-2"></i>Find Jobs
                    </h2>
                    <p class="text-muted mb-0">Discover your next career opportunity</p>
                </div>
                <div class="col-md-4">
                    <label for="sort" class="form-label fw-semibold">Sort By</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value="1" {{ Request::get('sort') == '1' ? 'selected' : '' }}>Latest First</option>
                        <option value="0" {{ Request::get('sort') == '0' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </div>
            </div>

            <div class="row g-4">
                <!-- Filters Sidebar -->
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm sticky-top" style="border-radius: 12px; top: 20px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-filter text-primary me-2"></i>Filters
                            </h5>
                            <form action="" name="searchForm" id="searchForm">
                                <div class="mb-4">
                                    <label for="keyword" class="form-label fw-semibold">Keywords</label>
                                    <input value="{{ Request::get('keyword') }}" type="text" name="keyword"
                                        id="keyword" placeholder="Job title, skills..." class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="location" class="form-label fw-semibold">Location</label>
                                    <input value="{{ Request::get('location') }}" type="text" name="location"
                                        id="location" placeholder="City, state..." class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label for="category" class="form-label fw-semibold">Category</label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="">All Categories</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option {{ Request::get('category') == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Job Type</label>
                                    @if ($jobTypes->isNotEmpty())
                                        @foreach ($jobTypes as $jobType)
                                            <div class="form-check mb-2">
                                                <input {{ in_array($jobType->id, $jobTypeArray) ? 'checked' : '' }}
                                                    class="form-check-input" name="job_type" type="checkbox"
                                                    value="{{ $jobType->id }}" id="job-type-{{ $jobType->id }}">
                                                <label class="form-check-label"
                                                    for="job-type-{{ $jobType->id }}">{{ $jobType->name }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <label for="experience" class="form-label fw-semibold">Experience</label>
                                    <select name="experience" id="experience" class="form-select">
                                        <option value="">Any Experience</option>
                                        <option value="1" {{ Request::get('experience') == 1 ? 'selected' : '' }}>1
                                            Year</option>
                                        <option value="2" {{ Request::get('experience') == 2 ? 'selected' : '' }}>2
                                            Years</option>
                                        <option value="3" {{ Request::get('experience') == 3 ? 'selected' : '' }}>3
                                            Years</option>
                                        <option value="4" {{ Request::get('experience') == 4 ? 'selected' : '' }}>4
                                            Years</option>
                                        <option value="5" {{ Request::get('experience') == 5 ? 'selected' : '' }}>5
                                            Years</option>
                                        <option value="6" {{ Request::get('experience') == 6 ? 'selected' : '' }}>6
                                            Years</option>
                                        <option value="7" {{ Request::get('experience') == 7 ? 'selected' : '' }}>7
                                            Years</option>
                                        <option value="8" {{ Request::get('experience') == 8 ? 'selected' : '' }}>8
                                            Years</option>
                                        <option value="9" {{ Request::get('experience') == 9 ? 'selected' : '' }}>9
                                            Years</option>
                                        <option value="10" {{ Request::get('experience') == 10 ? 'selected' : '' }}>
                                            10 Years</option>
                                        <option value="10_plus"
                                            {{ Request::get('experience') == '10_plus' ? 'selected' : '' }}>10+ Years
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="fas fa-search me-2"></i>Apply Filters
                                </button>
                                <a href="{{ route('jobs') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-redo me-2"></i>Reset All
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="col-lg-9">
                    @if ($jobs->isNotEmpty())
                        <div class="row g-4">
                            @foreach ($jobs as $job)
                                <div class="col-md-6 col-xl-4">
                                    <div class="card border-0 shadow-sm h-100 hover-lift"
                                        style="border-radius: 12px; transition: all 0.3s ease;">
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-start justify-content-between mb-3">
                                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                                    {{ $job->jobType->name }}
                                                </span>
                                                <i class="far fa-bookmark text-muted"></i>
                                            </div>

                                            <h5 class="fw-bold mb-3">{{ $job->title }}</h5>
                                            <p class="text-muted small mb-4">
                                                {{ Str::words(strip_tags($job->description), 10, '...') }}</p>

                                            <div class="mb-4">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-map-marker-alt text-primary me-2"
                                                        style="width: 20px;"></i>
                                                    <span class="text-muted small">{{ $job->location }}</span>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-briefcase text-primary me-2"
                                                        style="width: 20px;"></i>
                                                    <span class="text-muted small">{{ $job->category->name }}</span>
                                                </div>
                                                @if (!is_null($job->salary))
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-dollar-sign text-primary me-2"
                                                            style="width: 20px;"></i>
                                                        <span class="text-muted small">{{ $job->salary }}</span>
                                                    </div>
                                                @endif
                                            </div>

                                            <a href="{{ route('jobDetail', $job->id) }}"
                                                class="btn btn-outline-primary w-100">
                                                View Details <i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5 d-flex justify-content-center">
                            {{ $jobs->withQueryString()->links() }}
                        </div>
                    @else
                        <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-search fa-4x text-muted mb-3"></i>
                                <h5 class="fw-bold mb-2">No Jobs Found</h5>
                                <p class="text-muted mb-4">Try adjusting your filters to see more results</p>
                                <a href="{{ route('jobs') }}" class="btn btn-primary">
                                    <i class="fas fa-redo me-2"></i>Clear Filters
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.15) !important;
        }
    </style>
@endsection

@section('customJs')
    <script>
        $("#searchForm").submit(function(e) {
            e.preventDefault();

            var url = '{{ route('jobs') }}?';

            var keyword = $("#keyword").val();
            var location = $("#location").val();
            var category = $("#category").val();
            var experience = $("#experience").val();
            var sort = $("#sort").val();

            var checkedJobTypes = $("input:checkbox[name='job_type']:checked").map(function() {
                return $(this).val();
            }).get();

            // If keyword has a value
            if (keyword != "") {
                url += '&keyword=' + keyword;
            }

            // If location has a value
            if (location != "") {
                url += '&location=' + location;
            }

            // If category has a value
            if (category != "") {
                url += '&category=' + category;
            }

            // If experience has a value
            if (experience != "") {
                url += '&experience=' + experience;
            }

            // If user has checked job types
            if (checkedJobTypes.length > 0) {
                url += '&jobType=' + checkedJobTypes;
            }

            url += '&sort=' + sort;

            window.location.href = url;

        });

        $("#sort").change(function() {
            $("#searchForm").submit();
        });
    </script>
@endsection
