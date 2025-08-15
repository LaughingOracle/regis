<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Title extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'full_title',
        'type'
    ];

    public function titles(): BelongsToMany
    {
        return $this->belongsToMany(Title::class, 'doctor_title', 'doctor_id', 'title_id');
    }
}
