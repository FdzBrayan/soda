<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
