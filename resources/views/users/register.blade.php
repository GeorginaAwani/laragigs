@extends('layout')

@section('content')
    <div class="container my-5">
        <x-card class="p-5 mt-4 w-75">
            <header class="text-center">
                <h1 class="h2">Register</h1>
                <p>Create an account to post gigs</p>
            </header>

            <form action="/users" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Prevents cross-site scripting attack --}}
                <div class="form-group mb-3">
                    <x-input-form-group name="name" title="Name"></x-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-input-form-group name="email" title="Email address" type="email"></x-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-input-form-group name="password" title="Password" type="password"></x-input-form-group>
                </div>

                <div class="form-group mb-3">
                    <x-input-form-group name="password_confirmation" title="Confirm Password" type="password">
                    </x-input-form-group>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark px-3 py-2">Register</button>
                </div>
            </form>
        </x-card>
    </div>
@endsection
