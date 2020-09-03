<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => 'true'
            ]
        ];
    }

    // Estableciendo relación uno a muchos inversa de posts a usuario.
    // La palabra usuario se pone en singular debido a la dirección de la relación.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
