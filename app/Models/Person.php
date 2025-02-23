<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'birth_name', 'middle_names', 'date_of_birth', 'created_by'
    ];

    // Relation : Une personne a plusieurs enfants
    public function children()
    {
        return $this->hasMany(Relationship::class, 'parent_id');  
    }

    // Relation : Une personne a plusieurs parents
    public function parents()
    {
        return $this->hasMany(Relationship::class, 'child_id');  
    }

    // Relation : Une personne a un utilisateur créateur
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
