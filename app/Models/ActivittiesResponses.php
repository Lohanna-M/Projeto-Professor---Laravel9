<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivittiesResponses extends Model
{
    use HasFactory;

    protected $fillable = [
         'filepath', 'description', 'note', 'check', 'user_id', 'activitties_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activitties::class, 'activity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
