<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use sluggable;

    // Configurando la asignación masiva de datos
    // Inidca a laravel que datos recibir 
    protected $fillable = [
        'title', 'body', 'iframe', 'image', 'user_id'
    ];

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

    public function getGetExtractAttribute()
    {
        // return substr($this->body, 0, 140);
        return Str::limit($this->body, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image)
            return url("storage/$this->image");
    }
}
