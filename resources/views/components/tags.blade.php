@props(['tags'])

<ul class="list-inline my-3">
    @php
        $tags = explode(', ', $tags);
    @endphp

    @foreach ($tags as $tag)
        <li class="list-inline-item">
            <a href="/?tag={{ $tag }}"
                class="tag btn rounded-pill btn-sm btn-dark text-capitalize">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
