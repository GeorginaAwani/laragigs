@extends('layout')

@section('content')
    <div class="container mt-4">
        <main>
            <x-card class="p-5 mt-4 w-75">
                <h1 class="h2 text-center">Manage listings</h1>

                <table class="table mt-5">
                    <tbody class="align-middle">
                        @unless (empty($listings))
                            @foreach ($listings as $listing)
                                <tr>
                                    <td class="p-3"><a href="/listings/{{ $listing->id }}"
                                            class="text-reset text-black fw-bold">{{ $listing->title }}</a></td>
                                    <td class="p-3">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="/listings/{{ $listing->id }}/edit" class="btn btn-sm btn-light"><i
                                                    class="fa-solid fa-pencil"></i> Edit</a>
                                            <form method="POST" action="/listings/{{ $listing->id }}" class="mb-0 ms-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa-solid fa-trash"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td rowspan="2" class="p-3 text-center">No listings found</td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </x-card>
        </main>
    </div>
@endsection
