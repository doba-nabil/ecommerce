@if (session()->has('done'))
    <p class="alert alert-success">{{ session()->get('done') }}</p>
@endif
@if (session()->has('error'))
    <p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif