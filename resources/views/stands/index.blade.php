@extends('layouts.app')

@section('title', 'Nos Exposants')

@section('content')
    <h2>Nos Exposants</h2>

    @if($stands->isEmpty())
        <p>Aucun stand disponible pour le moment.</p>
    @else
        <ul>
            @foreach($stands as $stand)
                <li>
                    <a href="{{ route('stands.show', $stand->id) }}">{{ $stand->nom_stand }}</a>
                    <p>{{ $stand->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
