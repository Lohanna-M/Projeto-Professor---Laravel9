<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $table = 'diciplines';
    protected $fillable = [
        'name',
    ];

    public function activitties()
    {
        return $this->hasMany(Activitties::class, 'dicipline_id', 'id');
    }
}
