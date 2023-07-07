@php
    /**
     * @var App\Models\Listing $listings
     **/
@endphp

<!-- PHP tags work here too -->
<!-- Wrap larger PHP code in the php and endphp directives -->
@extends('layout')

@section('content')
    <!-- A blade template allows us use double curly braces in place of the php tag to echo -->
    @include('partials._hero')
    <div class="container">
        @include('partials._search')
        <div class="row">

            {{-- Unless directive works as long as the condition is not true --}}
            @unless (count($listings) == 0)
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" class="h-100" />
                @endforeach
            @else
                <p>No listings found</p>
            @endunless
        </div>
        <div class="mt-4">
            {{ $listings->links() }}

        </div>

        {{-- You can use Laravel methods to define custom paginator --}}
        <section id="pagination">
            <div class="d-flex align-items-center justify-content-center">
                @unless ($listings->onFirstPage())
                    <a class="btn px-3 rounded-0 btn-light mx-1" href="{{ $listings->previousPageUrl() }}"><i
                            class="fa-light fa-chevron-left me-2"></i>Previous</a>
                @endunless

                @if ($listings->hasMorePages())
                    <a class="btn px-3 rounded-0 btn-dark mx-1" href="{{ $listings->nextPageUrl() }}"><i
                            class="fa-light fa-chevron-right me-2"></i>Next</a>
                @endif
            </div>
        </section>
    @endsection
