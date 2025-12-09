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
                            <li class="breadcrumb-item active">My Jobs</li>
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
                    <div class="card border-0 shadow mb-4" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3"
                                        style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-briefcase text-white" style="font-size: 20px;"></i>
                                    </div>
                                    <div>
                                        <h3 class="fs-4 mb-0" style="color: var(--text-dark); font-weight: 600;">My Jobs
                                        </h3>
                                        <p class="text-muted mb-0" style="font-size: 14px;">Manage your posted jobs</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('account.createJob') }}" class="btn btn-primary"
                                        style="padding: 10px 24px; border-radius: 8px; font-weight: 600;"><i
                                            class="fas fa-plus me-2"></i>Post a Job</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr
                                            style="background-color: #f9fafb; border-bottom: 2px solid var(--primary-blue);">
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Title</th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Job
                                                Created</th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Applicants
                                            </th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Status
                                            </th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($jobs->isNotEmpty())
                                            @foreach ($jobs as $job)
                                                <tr style="border-bottom: 1px solid #e5e7eb; transition: background-color 0.2s;"
                                                    onmouseover="this.style.backgroundColor='#f9fafb'"
                                                    onmouseout="this.style.backgroundColor='white'">
                                                    <td style="padding: 16px;">
                                                        <div
                                                            style="font-weight: 600; color: var(--text-dark); margin-bottom: 4px;">
                                                            {{ $job->title }}</div>
                                                        <div style="font-size: 14px; color: var(--text-muted);"><i
                                                                class="fas fa-clock me-1"
                                                                style="font-size: 12px;"></i>{{ $job->jobType->name }} <span
                                                                class="mx-1">•</span> <i
                                                                class="fas fa-map-marker-alt me-1"
                                                                style="font-size: 12px;"></i>{{ $job->location }}</div>
                                                    </td>
                                                    <td style="padding: 16px; color: var(--text-muted);">
                                                        {{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                                    <td style="padding: 16px;">
                                                        <span class="badge"
                                                            style="background-color: var(--primary-blue-light); color: var(--primary-blue); padding: 6px 12px; border-radius: 6px; font-weight: 600;">
                                                            {{ $job->applications->count() }}
                                                            Application
                                                        </span>
                                                    </td>
                                                    <td style="padding: 16px;">
                                                        @if ($job->status == 1)
                                                            <span class="badge"
                                                                style="background-color: var(--primary-blue-light); color: var(--primary-blue); padding: 6px 12px; border-radius: 6px; font-weight: 600;"><i
                                                                    class="fas fa-check-circle me-1"></i>Active</span>
                                                        @else
                                                            <span class="badge"
                                                                style="background-color: #fee2e2; color: #991b1b; padding: 6px 12px; border-radius: 6px; font-weight: 600;"><i
                                                                    class="fas fa-ban me-1"></i>Blocked</span>
                                                        @endif
                                                    </td>
                                                    <td style="padding: 16px;">
                                                        <div class="action-dots float-end">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                style="padding: 6px 12px; border-radius: 6px; border: 1px solid #e5e7eb;">
                                                                <i class="fas fa-ellipsis-v"
                                                                    style="color: var(--text-muted);"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('jobDetail', $job->id) }}"
                                                                        style="padding: 10px 16px; border-radius: 6px;"><i
                                                                            class="fas fa-eye me-2"
                                                                            style="color: var(--primary-blue);"></i>View</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('account.editJob', $job->id) }}"
                                                                        style="padding: 10px 16px; border-radius: 6px;"><i
                                                                            class="fas fa-edit me-2"
                                                                            style="color: var(--primary-blue);"></i>Edit</a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider" style="margin: 8px 0;">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="deleteJob({{ $job->id }})"
                                                                        style="padding: 10px 16px; border-radius: 6px; color: #dc2626;"><i
                                                                            class="fas fa-trash me-2"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')
    <script type="text/javascript">
        function deleteJob(jobId) {
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: '{{ route('account.deleteJob') }}',
                    type: 'post',
                    data: {
                        jobId: jobId
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.myJobs') }}';
                    }
                });
            }
        }
    </script>
@endsection
