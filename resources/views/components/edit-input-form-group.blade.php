@props(['name', 'title', 'type' => 'text', 'listing'])
<label for="title" class="form-label">{{ $title }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control py-2 rounded-1"
    required value="{{ $listing->$name }}" />
@error($name)
    <x-error-message :message="$message"></x-error-message>
@enderror
