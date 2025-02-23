<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes de l'application : FONO COLINCE</title>
</head>
<body>

    <h1>Voici les routes développées pour l'application :</h1>

    <ul>
        <li><a href="{{ route('people.index') }}">Liste des Personnes</a></li>
        <li><a href="{{ route('people.create') }}">Créer une Personne</a></li>
        <li><a href="{{ route('people.show', ['person' => 1]) }}">Afficher une Personne (Exemple)</a></li>
    </ul>

</body>
</html>
