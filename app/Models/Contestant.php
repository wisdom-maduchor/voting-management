<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Contestant extends Model
// {
//     //
// }

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contestant extends Authenticatable
{
    // …
    public function contests()
    {
        return $this->belongsToMany(Contest::class, 'contest_contestant')
                    ->withTimestamps();
    }
}
