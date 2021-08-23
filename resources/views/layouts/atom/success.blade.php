@if(session('msg_success'))
    <div class="alert alert-success text-center mb-1" role="alert">
        {{ session('msg_success') }}
    </div>
@endif