<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitties extends Model
{
    use HasFactory;
    protected $table = 'activitties';

    protected $fillable = [
        'name', 'filepath', 'description', 'note', 'check', 'dicipline_id', 'user_id',
    ];

    /**
     * Get the user that owns the Activitties
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diciplines()
    {
        return $this->belongsTo(Discipline::class, 'dicipline_id', 'id');
    }
}
