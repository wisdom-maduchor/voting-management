<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at',
    ];
    
    public function contestants()
    {
        return $this->belongsToMany(Contestant::class, 'contest_contestant')
                    ->withTimestamps();
    }
}
