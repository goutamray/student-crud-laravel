@if (session('error'))
<p class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <button type="button"
        class="btn-close"
        aria-label="Close"
        data-bs-dismiss="alert"></button>
</p>
@endif

{{-- Keep this for validation errors --}}
@if($errors->any())
<p class="alert alert-danger alert-dismissible fade show">
    {{ $errors->first() }}
    <button type="button"
        class="btn-close"
        aria-label="Close"
        data-bs-dismiss="alert"></button>
</p>
@endif


@if (session('success'))
<p class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button"
        class="btn-close"
        aria-label="Close"
        data-bs-dismiss="alert"></button>
</p>
@endif