<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $table = 'relationships';

    protected $fillable = [
        'created_by', 'parent_id', 'child_id'
    ];

    // Relation : Un enfant appartient à un parent
    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }

    // Relation : Un parent a un enfant
    public function child()
    {
        return $this->belongsTo(Person::class, 'child_id');
    }

    // Relation : Une relation a un utilisateur créateur
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
