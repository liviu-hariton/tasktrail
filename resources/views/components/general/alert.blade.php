<div class="alert alert-{{ $type }} {{ $bordered ? '' : 'border-0' }} {{ $rounded ? 'alert-rounded' : '' }} {{ $dismissible ? 'alert-dismissible fade show' : '' }} {{ $icon !== '' ? 'alert-styled-left alert-arrow-left alert-icon' : '' }}">
    @if( $icon !== '' )
    <i class="mdi {{ $icon }}"></i>
    @endif

    {!! $message !!}

    @if( $dismissible )
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    @endif
</div>
