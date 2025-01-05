<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
//    protected $table = 'games';

//    protected $fillable

    public $timestamps = false;

    public function licence(): BelongsTo
    {

        return $this->belongsTo(licence::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_games');
    }

    use HasFactory;
}
