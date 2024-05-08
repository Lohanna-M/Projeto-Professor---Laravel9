<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitties extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'filepath', 'description', 'note', 'check',
    ];
}
