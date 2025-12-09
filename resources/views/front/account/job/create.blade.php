@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4" style="background-color: white;">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--primary-blue);"><i
                                        class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active">Post New Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')

                    <form action="" method="post" id="createJobForm" name="createJobForm">
                        <div class="card border-0 shadow mb-4" style="border-radius: 12px;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="icon-box me-3"
                                        style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-briefcase text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-4 mb-0" style="color: var(--text-dark); font-weight: 600;">Job Details
                                        </h3>
                                        <p class="text-muted mb-0" style="font-size: 14px;">Fill in the job information
                                            below</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="title" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-pencil-alt me-2"
                                                style="color: var(--primary-blue);"></i>Title<span
                                                style="color: #ef4444;">*</span></label>
                                        <input type="text" placeholder="e.g. Senior Software Engineer" id="title"
                                            name="title" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="category" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-folder me-2"
                                                style="color: var(--primary-blue);"></i>Category<span
                                                style="color: #ef4444;">*</span></label>
                                        <select name="category" id="category" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                            <option value="">Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="jobType" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-clock me-2"
                                                style="color: var(--primary-blue);"></i>Job Type<span
                                                style="color: #ef4444;">*</span></label>
                                        <select name="jobType" id="jobType" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                            <option value="">Select Job Type</option>
                                            @if ($jobTypes->isNotEmpty())
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="vacancy" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-users me-2"
                                                style="color: var(--primary-blue);"></i>Vacancy<span
                                                style="color: #ef4444;">*</span></label>
                                        <input type="number" min="1" placeholder="e.g. 5" id="vacancy"
                                            name="vacancy" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="salary" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-dollar-sign me-2"
                                                style="color: var(--primary-blue);"></i>Salary</label>
                                        <input type="text" placeholder="e.g. $50,000 - $70,000" id="salary"
                                            name="salary" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="location" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-map-marker-alt me-2"
                                                style="color: var(--primary-blue);"></i>Location<span
                                                style="color: #ef4444;">*</span></label>
                                        <input type="text" placeholder="e.g. New York, NY" id="location"
                                            name="location" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-align-left me-2"
                                            style="color: var(--primary-blue);"></i>Description<span
                                            style="color: #ef4444;">*</span></label>
                                    <textarea class="textarea form-control" name="description" id="description" cols="5" rows="5"
                                        placeholder="Provide a detailed job description"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;"></textarea>
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="benefits" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-gift me-2"
                                            style="color: var(--primary-blue);"></i>Benefits</label>
                                    <textarea class="textarea form-control" name="benefits" id="benefits" cols="5" rows="5"
                                        placeholder="e.g. Health insurance, 401k, flexible hours"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-tasks me-2"
                                            style="color: var(--primary-blue);"></i>Responsibility</label>
                                    <textarea class="textarea form-control" name="responsibility" id="responsibility" cols="5" rows="5"
                                        placeholder="List the main job responsibilities"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-graduation-cap me-2"
                                            style="color: var(--primary-blue);"></i>Qualifications</label>
                                    <textarea class="textarea form-control" name="qualifications" id="qualifications" cols="5" rows="5"
                                        placeholder="List required qualifications and skills"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="experience" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-chart-line me-2"
                                            style="color: var(--primary-blue);"></i>Experience <span
                                            style="color: #ef4444;">*</span></label>
                                    <select name="experience" id="experience" class="form-control"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="4">4 Years</option>
                                        <option value="5">5 Years</option>
                                        <option value="6">6 Years</option>
                                        <option value="7">7 Years</option>
                                        <option value="8">8 Years</option>
                                        <option value="9">9 Years</option>
                                        <option value="10">10 Years</option>
                                        <option value="10_plus">10+ Years</option>
                                    </select>
                                    <p></p>
                                </div>

                                <div class="mb-4">
                                    <label for="keywords" class="form-label fw-semibold"
                                        style="color: var(--text-dark);"><i class="fas fa-tags me-2"
                                            style="color: var(--primary-blue);"></i>Keywords</label>
                                    <input type="text" placeholder="e.g. Python, Django, AWS (comma separated)"
                                        id="keywords" name="keywords" class="form-control"
                                        style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                </div>

                                <div class="border-top pt-4 mt-4">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="icon-box me-3"
                                            style="width: 48px; height: 48px; background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-building text-white" style="font-size: 20px;"></i>
                                        </div>
                                        <div>
                                            <h3 class="fs-5 mb-0" style="color: var(--text-dark); font-weight: 600;">
                                                Company Details</h3>
                                            <p class="text-muted mb-0" style="font-size: 14px;">Information about the
                                                hiring company</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-4 col-md-6">
                                            <label for="company_name" class="form-label fw-semibold"
                                                style="color: var(--text-dark);"><i class="fas fa-building me-2"
                                                    style="color: var(--primary-blue);"></i>Company Name<span
                                                    style="color: #ef4444;">*</span></label>
                                            <input type="text" placeholder="Company Name" id="company_name"
                                                name="company_name" class="form-control"
                                                style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                            <p></p>
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label for="company_location" class="form-label fw-semibold"
                                                style="color: var(--text-dark);"><i class="fas fa-map-marker-alt me-2"
                                                    style="color: var(--primary-blue);"></i>Company Location</label>
                                            <input type="text" placeholder="Location" id="company_location"
                                                name="company_location" class="form-control"
                                                style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="website" class="form-label fw-semibold"
                                            style="color: var(--text-dark);"><i class="fas fa-globe me-2"
                                                style="color: var(--primary-blue);"></i>Website</label>
                                        <input type="text" placeholder="https://www.company.com" id="website"
                                            name="website" class="form-control"
                                            style="border-radius: 8px; padding: 12px; border: 1px solid #e5e7eb;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-4"
                                style="background-color: #f9fafb; border-top: 1px solid #e5e7eb; border-radius: 0 0 12px 12px;">
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 12px 32px; border-radius: 8px; font-weight: 600;"><i
                                        class="fas fa-save me-2"></i>Save Job</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#createJobForm").submit(function(e) {
            e.preventDefault();
            $("button[type='submit']").prop('disabled', true);

            $.ajax({
                url: '{{ route('account.saveJob') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createJobForm").serializeArray(),
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);

                    if (response.status == true) {

                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#jobType").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')


                        $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#company_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('account.myJobs') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title)
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.category) {
                            $("#category").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category)
                        } else {
                            $("#category").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.jobType) {
                            $("#jobType").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.jobType)
                        } else {
                            $("#jobType").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.vacancy) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy)
                        } else {
                            $("#vacancy").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.location) {
                            $("#location").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location)
                        } else {
                            $("#location").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.description) {
                            $("#description").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.description)
                        } else {
                            $("#description").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.company_name) {
                            $("#company_name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name)
                        } else {
                            $("#company_name").removeClass('is-invalid')
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
