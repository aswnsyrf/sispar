@extends('homepage.index ')

@section('content')
    <h1>Search Results</h1>

    @if ($destinasi->isEmpty())
        <p>No results found.</p>
    @else
        <ul>
            @foreach ($destinasi as $wisata)
                <li>{{ $wisata->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
