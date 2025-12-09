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
                            <li class="breadcrumb-item active">Job Applications</li>
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
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box me-3"
                                    style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-file-alt text-white" style="font-size: 20px;"></i>
                                </div>
                                <div>
                                    <h3 class="fs-4 mb-0" style="color: var(--text-dark); font-weight: 600;">Job
                                        Applications</h3>
                                    <p class="text-muted mb-0" style="font-size: 14px;">Manage all applications</p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr
                                            style="background-color: #f9fafb; border-bottom: 2px solid var(--primary-blue);">
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Job Title
                                            </th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">User</th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Employer
                                            </th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Applied
                                                Date</th>
                                            <th scope="col"
                                                style="padding: 14px; font-weight: 600; color: var(--text-dark);">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($applications->isNotEmpty())
                                            @foreach ($applications as $application)
                                                <tr style="border-bottom: 1px solid #e5e7eb; transition: background-color 0.2s;"
                                                    onmouseover="this.style.backgroundColor='#f9fafb'"
                                                    onmouseout="this.style.backgroundColor='white'">
                                                    <td style="padding: 16px;">
                                                        <div style="font-weight: 600; color: var(--text-dark);">
                                                            {{ $application->job->title }}</div>
                                                    </td>
                                                    <td style="padding: 16px; color: var(--text-muted);"><i
                                                            class="fas fa-user me-2"
                                                            style="color: var(--primary-blue); font-size: 14px;"></i>{{ $application->user->name }}
                                                    </td>
                                                    <td style="padding: 16px; color: var(--text-muted);"><i
                                                            class="fas fa-building me-2"
                                                            style="color: var(--primary-blue); font-size: 14px;"></i>{{ $application->employer->name }}
                                                    </td>
                                                    <td style="padding: 16px; color: var(--text-muted);"><i
                                                            class="fas fa-calendar me-2"
                                                            style="color: var(--primary-blue); font-size: 14px;"></i>{{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                                                    </td>
                                                    <td style="padding: 16px;">
                                                        <div class="action-dots">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                style="padding: 6px 12px; border-radius: 6px; border: 1px solid #e5e7eb;">
                                                                <i class="fas fa-ellipsis-v"
                                                                    style="color: var(--text-muted);"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                                                <li><a class="dropdown-item"
                                                                        onclick="deleteJobApplication({{ $application->id }})"
                                                                        href="javascript:void(0);"
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
                                {{ $applications->links() }}
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
        function deleteJobApplication(id) {
            if (confirm("Are you sure you want to delete?")) {
                $.ajax({
                    url: '{{ route('admin.jobApplications.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "{{ route('admin.jobApplications') }}";
                    }
                });
            }
        }
    </script>
@endsection
