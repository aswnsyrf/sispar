@extends('homepage.index')

@section('content')
    <div class="container">
        @if ($results->isEmpty())
            <p>No results found</p>
        @else
            <ul>
                @foreach ($results as $result)
                    <li>{{ $result->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
