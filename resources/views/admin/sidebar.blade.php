<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="p-4 border-bottom">
            <h6 class="fw-bold mb-0 text-primary">
                <i class="fas fa-shield-alt me-2"></i>Admin Panel
            </h6>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item border-0 p-0">
                <a href="{{ route('admin.users') }}"
                    class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                    <i class="fas fa-users text-primary me-3" style="width: 20px;"></i>
                    <span class="fw-500">Users</span>
                    <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                </a>
            </li>
            <li class="list-group-item border-0 p-0">
                <a href="{{ route('admin.jobs') }}"
                    class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                    <i class="fas fa-briefcase text-primary me-3" style="width: 20px;"></i>
                    <span class="fw-500">Jobs</span>
                    <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                </a>
            </li>
            <li class="list-group-item border-0 p-0">
                <a href="{{ route('admin.jobApplications') }}"
                    class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                    <i class="fas fa-file-alt text-primary me-3" style="width: 20px;"></i>
                    <span class="fw-500">Job Applications</span>
                    <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                </a>
            </li>
            <li class="list-group-item border-0 p-0">
                <a href="{{ route('account.logout') }}"
                    class="d-flex align-items-center text-decoration-none text-danger p-3 hover-bg-light">
                    <i class="fas fa-sign-out-alt me-3" style="width: 20px;"></i>
                    <span class="fw-500">Logout</span>
                    <i class="fas fa-chevron-right ms-auto small"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .hover-bg-light:hover {
        background-color: #f8fafc;
        transition: background-color 0.2s ease;
    }

    .fw-500 {
        font-weight: 500;
    }
</style>
