@extends('layout')

@section('content')
    <main class="container mt-4">
        <x-back-button></x-back-button>

        <x-card class="p-5 mt-4 w-75">
            <header class="text-center">
                <h1 class="h2">Edit gig</h1>
                <p>Edit <b>{{ $listing->title }}</b></p>
            </header>

            <form action="/listings/{{ $listing->id }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Prevents cross-site scripting attack --}}
                @method('PUT')
                {{-- Specify method  --}}

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="company" title="Company Name" :listing="$listing">
                    </x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="title" title="Job Title" :listing="$listing"></x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="location" title="Job location" :listing="$listing">
                    </x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="email" title="Email address" type="email" :listing="$listing">
                    </x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="website" title="Website/Application URL" :listing="$listing">
                    </x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-edit-input-form-group name="tags" title="Tags (Comma Separated)" :listing="$listing">
                    </x-edit-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <label for="logo" class="form-label">Company Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                    {{-- error matching validation name --}}
                    <img src="{{ asset($listing->logo ? "storage/{$listing->logo}" : 'images/image1.jpg') }}" alt=""
                        class="mx-auto">
                    @error('logo')
                        <x-error-message :message="$message"></x-error-message>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Job Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $listing->description }}</textarea>
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
