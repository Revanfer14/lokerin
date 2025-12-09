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
                            <li class="breadcrumb-item active">Jobs Applied</li>
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
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box me-3"
                                    style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-paper-plane text-white" style="font-size: 20px;"></i>
                                </div>
                                <div>
                                    <h3 class="fs-4 mb-0" style="color: var(--text-dark); font-weight: 600;">Jobs Applied
                                    </h3>
                                    <p class="text-muted mb-0" style="font-size: 14px;">Track your job applications</p>
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
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Applied
                                                Date</th>
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
                                        @if ($jobApplications->isNotEmpty())
                                            @foreach ($jobApplications as $jobApplication)
                                                <tr style="border-bottom: 1px solid #e5e7eb; transition: background-color 0.2s;"
                                                    onmouseover="this.style.backgroundColor='#f9fafb'"
                                                    onmouseout="this.style.backgroundColor='white'">
                                                    <td style="padding: 16px;">
                                                        <div
                                                            style="font-weight: 600; color: var(--text-dark); margin-bottom: 4px;">
                                                            {{ $jobApplication->job->title }}</div>
                                                        <div style="font-size: 14px; color: var(--text-muted);"><i
                                                                class="fas fa-clock me-1"
                                                                style="font-size: 12px;"></i>{{ $jobApplication->job->jobType->name }}
                                                            <span class="mx-1">•</span> <i
                                                                class="fas fa-map-marker-alt me-1"
                                                                style="font-size: 12px;"></i>{{ $jobApplication->job->location }}
                                                        </div>
                                                    </td>
                                                    <td style="padding: 16px; color: var(--text-muted);">
                                                        {{ \Carbon\Carbon::parse($jobApplication->applied_date)->format('d M, Y') }}
                                                    </td>
                                                    <td style="padding: 16px;">
                                                        <span class="badge"
                                                            style="background-color: var(--primary-blue-light); color: var(--primary-blue); padding: 6px 12px; border-radius: 6px; font-weight: 600;">{{ $jobApplication->job->applications->count() }}
                                                            Applications</span>
                                                    </td>
                                                    <td style="padding: 16px;">
                                                        @if ($jobApplication->job->status == 1)
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
                                                                        href="{{ route('jobDetail', $jobApplication->job_id) }}"
                                                                        style="padding: 10px 16px; border-radius: 6px;"><i
                                                                            class="fas fa-eye me-2"
                                                                            style="color: var(--primary-blue);"></i>View</a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider" style="margin: 8px 0;">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="removeJob({{ $jobApplication->id }})"
                                                                        style="padding: 10px 16px; border-radius: 6px; color: #dc2626;"><i
                                                                            class="fas fa-trash me-2"></i>Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5"
                                                    style="padding: 40px; text-align: center; color: var(--text-muted);">
                                                    <i class="fas fa-inbox"
                                                        style="font-size: 48px; color: #e5e7eb; margin-bottom: 16px; display: block;"></i>
                                                    <p style="font-size: 16px; margin: 0;">No job applications found</p>
                                                </td>
                                            </tr>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $jobApplications->links() }}
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
        function removeJob(id) {
            if (confirm("Are you sure you want to remove?")) {
                $.ajax({
                    url: '{{ route('account.removeJobs') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.myJobApplications') }}';
                    }
                });
            }
        }
    </script>
@endsection
