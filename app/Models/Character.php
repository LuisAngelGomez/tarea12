<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    // Campos que permitimos llenar masivamente
    protected $fillable = ['name', 'picture_url', 'description'];

    // Relación: Un personaje pertenece a muchas películas
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
