<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    //// Fichier: app/Models/Stand.php
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
}
