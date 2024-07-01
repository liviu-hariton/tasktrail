@session('success')
<div class="alert alert-success alert-dismissible fade show alert-styled-left alert-arrow-left alert-icon">
    <i class="bi bi-check-square-fill"></i> {{ $value }}

    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
@endsession

@session('warning')
<div class="alert alert-warning alert-dismissible fade show alert-styled-left alert-arrow-left alert-icon">
    <i class="bi bi-cone-striped"></i> {{ $value }}

    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
@endsession

@session('error')
<div class="alert alert-danger alert-dismissible fade show alert-styled-left alert-arrow-left alert-icon">
    <i class="bi bi-dash-circle-fill"></i> {{ $value }}

    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
@endsession

@session('info')
<div class="alert alert-info alert-dismissible fade show alert-styled-left alert-arrow-left alert-icon">
    <i class="bi bi-info-circle-fill"></i> {{ $value }}

    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
</div>
@endsession
