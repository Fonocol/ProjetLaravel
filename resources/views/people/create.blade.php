@extends('layouts.app')

@section('content')
    <h1>Ajouter une personne</h1>

    @if ($errors->any())
        <div>
            <strong>Erreur :</strong>
            ul><
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('people.store') }}" method="POST">
        @csrf
        <label for="created_by">Créé par :</label>
        <select name="created_by" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Nom :</label>
        <input type="text" name="last_name" required>

        <label for="birth_name">Nom de naissance :</label>
        <input type="text" name="birth_name">

        <label for="middle_names">Autres prénoms :</label>
        <input type="text" name="middle_names">

        <label for="date_of_birth">Date de naissance :</label>
        <input type="date" name="date_of_birth">

        <button type="submit">Ajouter</button>
    </form>

    <a href="{{ route('people.index') }}">Retour</a>
@endsection
