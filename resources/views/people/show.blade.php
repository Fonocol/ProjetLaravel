@extends('layouts.app')

@section('content')
    <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
    <p>Créé par : {{ $person->creator->name ?? 'Inconnu' }}</p>

    <h3>Parents :</h3>
    <ul>
        @foreach($person->parents as $relationship)
            <li>{{ $relationship->parent->first_name }} {{ $relationship->parent->last_name }}</li>
        @endforeach
    </ul>

    <h3>Enfants :</h3>
    <ul>
        @foreach($person->children as $relationship)
            <li>{{ $relationship->child->first_name }} {{ $relationship->child->last_name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('people.index') }}">Retour</a>
@endsection



