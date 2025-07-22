<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        //// Fichier: app/Models/Category.php
    public function stands(): HasMany
    {
        return $this->hasMany(Stand::class);
    }
}
