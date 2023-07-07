@props(['listing'])

<div class="col-md-6 g-4">
    <x-card {{ $attributes->merge(['class' => 'd-flex align-items-center']) }}>
        <div class="d-md-block d-none img-wrap me-3">
            <img src="{{ asset($listing->logo ? "storage/{$listing->logo}" : 'images/image1.jpg') }}" alt=""
                style="width: 8rem">
        </div>
        <div>
            <h5><a href="listings/{{ $listing->id }}" class="text-decoration-none text-reset">{{ $listing->title }}</a>
            </h5>
            <div class="h6">{{ $listing->company }}</div>
            <x-tags :tags="$listing->tags"></x-tags>
            <p class="small mb-0"><i class="fa-regular fa-location-dot me-1"></i>{{ $listing->location }}
            </p>
        </div>
    </x-card>
</div>
