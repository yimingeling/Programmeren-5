<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Games::class, 'category_games');
    }


    use HasFactory;
}
