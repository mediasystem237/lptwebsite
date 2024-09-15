<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Les attributs que l'on peut remplir en masse
    protected $fillable = [
        'title', 'content', 'image', 'status', 'published_at'
    ];

    // Les attributs à caster automatiquement
    protected $casts = [
        'status' => 'string', // Assurez-vous que 'status' est traité comme une chaîne de caractères
        'published_at' => 'datetime', // Castez 'published_at' en tant qu'objet DateTime
    ];

    // Ajoutez une méthode pour vérifier si l'article est publié
    public function isPublished()
    {
        return $this->status === 'published';
    }

    // Ajoutez une méthode pour récupérer les articles publiés
    public static function published()
    {
        return static::where('status', 'published')->get();
    }
}
