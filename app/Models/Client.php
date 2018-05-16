<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = ['area_id','first_name','second_name','nickname','first_lastname','second_lastname'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
