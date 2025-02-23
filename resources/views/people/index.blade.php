@extends('layouts.app')

@section('content')
    <h1>Liste des personnes</h1>
    <a href="{{ route('people.create') }}">Ajouter une personne</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($people as $person)
            <li>
                {{ $person->first_name }} {{ $person->last_name }} 
                (créé par : {{ $person->creator->name ?? 'Inconnu' }})
                <a href="{{ route('people.show', $person->id) }}">Voir</a>
            </li>
        @endforeach
    </ul>
@endsection


