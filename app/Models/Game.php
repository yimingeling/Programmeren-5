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
    protected $fillable = [
        'name',
        'name',
        'year',
        'studio',
        'active',
        'image',
        'user_id',
    ];

    public $timestamps = false;

    public function licence(): BelongsTo
    {

        return $this->belongsTo(licence::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_games');
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Assuming the Game model has a 'user_id' foreign key
    }

    use HasFactory;
}
