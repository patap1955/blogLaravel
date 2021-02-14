@if(session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->pull('success') }}
    </div>
@endif
