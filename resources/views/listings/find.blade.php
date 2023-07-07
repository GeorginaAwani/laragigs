@extends('layout')

@section('content')
    <div class="container">
        @include('partials._search')

        <x-back-button></x-back-button>

        <main>
            <x-card class="text-center p-5">
                <img src="{{ asset($listing->logo ? "storage/{$listing->logo}" : 'images/image1.jpg') }}" alt=""
                    class="mx-auto">

                <h3 class="mt-4">{{ $listing->title }}</h3>
                <h5 class="fw-bold">{{ $listing->company }}</h5>
                <x-tags :tags="$listing->tags"></x-tags>
                <div class="small mb-0"><i class="fa-regular fa-location-dot me-1"></i>{{ $listing->location }}</div>
                <hr />
                <p>{{ $listing->description }}</p>

                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="mailto:{{ $listing->email }}" class="btn w-100 btn-warning rounded-3"><i
                                class="fa-regular fa-envelope me-1"></i>Contact
                            Employer</a>
                    </li>
                    <li>
                        <a href="{{ $listing->website }}" class="btn w-100 btn-dark rounded-3"><i
                                class="fa-regular fa-globe me-1"></i>Visit
                            Website</a>
                    </li>
                </ul>
            </x-card>

            @if (auth()->id() == $listing->user_id)
                <x-card class="mt-4 p-1 d-flex justify-content-center align-items-center">
                    <a href="/listings/{{ $listing->id }}/edit" class="text-reset">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <form method="POST" action="/listings/{{ $listing->id }}" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger"><i class="fa-light fa-trash"></i>
                            Delete</button>
                    </form>
                </x-card>
            @endif
        </main>
    </div>
@endsection
