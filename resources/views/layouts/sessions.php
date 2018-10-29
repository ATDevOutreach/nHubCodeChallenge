@if (session('success'))
    <div class="col-md-4">
        <div class="alert alert-success">
            <span>{{session('success')}}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-md-4">
        <div class="alert alert-danger">
            <span>{{session('error')}}</span>
        </div>
    </div>
@endif
