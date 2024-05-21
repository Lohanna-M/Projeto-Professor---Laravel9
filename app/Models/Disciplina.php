<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Disciplina
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     protected $fillable = [
        'name',
    ];

    public function activitties()
    {
        return $this->hasMany(Activitties::class, 'dicipline_id', 'id');
    }
}
