<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'nik',
        'name'
    ];

    public function titles(): BelongsToMany
    {
        return $this->belongsToMany(Title::class, 'doctor_title', 'doctor_id', 'title_id');
    }
}
