@if(session()->has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="mb-0">
        {{ session()->get('success') }}
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <p class="mb-0">
        {{ session()->get('error') }}
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
    </button>
</div>
@endif