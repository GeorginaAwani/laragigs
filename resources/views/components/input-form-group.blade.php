@props(['name', 'title', 'type' => 'text'])
<label for="title" class="form-label">{{ $title }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control py-2 rounded-1" required
    value="{{ old($name) }}" />
{{-- the old() helper displays the value that was inputted when the form was submitted --}}
@error($name)
<x-error-message :message="$message"></x-error-message>
@enderror