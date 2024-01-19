<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'art_picture'
    ];

    public function Artists(): BelongsToMany{
        return $this->BelongsToMany(Artist::class);
    }


}
