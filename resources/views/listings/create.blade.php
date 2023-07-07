@extends('layout')

@section('content')
<main class="container mt-4">
    <x-back-button></x-back-button>

    <x-card class="p-5 mt-4 w-75">
        <header class="text-center">
            <h1 class="h2">Create a gig</h1>
            <p>Post a gig to find a developer</p>
        </header>

        <form action="/listings" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Prevents cross-site scripting attack --}}
            <div class="form-group mb-3">
                <x-input-form-group name="company" title="Company Name"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <x-input-form-group name="title" title="Job Title"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <x-input-form-group name="location" title="Job location"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <x-input-form-group name="email" title="Email address" type="email"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <x-input-form-group name="website" title="Website/Application URL"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <x-input-form-group name="tags" title="Tags (Comma Separated)"></x-input-form-group>
            </div>

            <div class="form-group mb-3">
                <label for="logo" class="form-label">Company Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                {{-- error matching validation name --}}
                @error('logo')
                <x-error-message :message="$message"></x-error-message>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                <x-error-message :message="$message"></x-error-message>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark px-3 py-2">Create gig</button>
            </div>
        </form>
    </x-card>
</main>
@endsection