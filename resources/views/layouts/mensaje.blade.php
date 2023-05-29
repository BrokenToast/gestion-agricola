@if (session()->get('error'))
    <div class="alert alert-danger mensaje fs-5 d-flex align-items-center" role="alert">
        {{session()->get('error')}}
    </div>
@endif
@if (session()->get('success'))
    <div class="alert alert-success mensaje fs-5 d-flex align-items-center" role="alert">
        {{session()->get('success')}}
    </div>
@endif



