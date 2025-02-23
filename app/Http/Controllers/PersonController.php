<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PersonController extends BaseController
{
    //authentification obligatoire
    /*public function __construct()
    {
        $this->middleware('auth')->except('index', 'show','create','store');  
    }*/

    /**
     * Afficher la liste des personnes avec le nom de l'utilisateur qui les a créées.
     */

    public function index()
    {
        $people = Person::with('creator')->get(); 
        return view('people.index', compact('people'));
    }

    /**
     * Afficher une personne spécifique avec la liste de ses enfants et parents.
     */
    public function show($id)
    {
        $person = Person::with(['children', 'parents'])->findOrFail($id);
        return view('people.show', compact('person'));
    }

    /**
     * Afficher le formulaire de création d'une nouvelle personne.
     */
    public function create()
    {
        $users = User::all(); 
        return view('people.create', compact('users'));
    }

    /**
     * Valider les données et insérer une nouvelle personne.
     */
    public function store(Request $request)
    {
    // Valider les données
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'birth_name' => 'nullable|string|max:255',
        'middle_names' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
    ]);

    // Formater les données selon les règles
    $validated['created_by'] = auth()->id(); 
    $validated['first_name'] = ucfirst(strtolower($validated['first_name']));
    $validated['middle_names'] = $this->formatMiddleNames($validated['middle_names']);
    $validated['last_name'] = strtoupper($validated['last_name']); 
    $validated['birth_name'] = strtoupper($validated['birth_name'] ?? $validated['last_name']);
    $validated['date_of_birth'] = $validated['date_of_birth'] ? date('Y-m-d', strtotime($validated['date_of_birth'])) : null; 

    // Créer la personne
    Person::create($validated);

    return redirect()->route('people.index')->with('success', 'Personne ajoutée avec succès !');
    }


    

}
