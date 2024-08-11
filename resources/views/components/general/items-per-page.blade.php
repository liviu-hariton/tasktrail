<select class="custom-select" onchange="_tt_xhr['setPerPage'](this)" data-route="{{ route('set-per-page-option') }}">
    @foreach($per_page_options as $per_page_option)
    <option value="{{ $per_page_option['number'] }}" {{ $per_page_option['is_current'] ? 'selected="selected"' : '' }} >{{ __('layout.per_page_items', ['number' => $per_page_option['number']]) }}</option>
    @endforeach
</select>
