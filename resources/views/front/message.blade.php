@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert"
        style="border-radius: 12px; border-left: 4px solid var(--primary-blue) !important; background-color: var(--primary-blue-light); color: var(--primary-blue);">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fs-4"></i>
            <div>
                <strong>Success!</strong>
                <p class="mb-0 mt-1">{{ Session::get('success') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert"
        style="border-radius: 12px; border-left: 4px solid #ef4444 !important;">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-circle me-3 fs-4"></i>
            <div>
                <strong>Error!</strong>
                <p class="mb-0 mt-1">{{ Session::get('error') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
