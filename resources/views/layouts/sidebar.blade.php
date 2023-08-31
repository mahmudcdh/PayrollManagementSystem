<div class="card">
    <div class="card-header">
        <span class="d-grid gap-2">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('home') }}">Hello, {{Auth::user()->name}}</a></span>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="d-grid gap-2 mb-2">
                <a href="" class="btn btn-secondary btn-sm"><span>Notification</span></a>
            </div>
            <div class="d-grid gap-2 mb-2">
                <a href="{{ route('leave.application') }}" class="btn btn-secondary btn-sm"><span>Leave Application</span></a>
            </div>
            <div class="d-grid gap-2">
                <a href="" class="btn btn-secondary btn-sm"><span>Actions</span></a>
            </div>

    </div>
</div>
