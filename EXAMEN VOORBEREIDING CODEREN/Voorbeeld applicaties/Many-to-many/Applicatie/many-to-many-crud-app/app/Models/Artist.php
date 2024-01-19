<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_picture'
    ];

    public function Artworks(): BelongsToMany{
        return $this->BelongsToMany(Artwork::class);
    }



}
