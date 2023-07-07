{{-- check for a value in session --}}
@if (session()->has('message'))
<div class="alert alert-success align-items-center d-flex end-0 mb-0 position-fixed rounded-0 top-0 translate-middle-x w-50 alert-dismissible" role="alert" style="z-index: 1050">
    <i class="fa-light fa-check me-2"></i>
    {{-- get message from session --}}
    <div>{{ session('message') }}</div>
    <button class="btn-close" id="flashClose" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('#flashClose').click();
        }, 5000);
    });
</script>
@endif