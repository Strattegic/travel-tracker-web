<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    /**
    * All locations that belong to the specified user (via user_id)
    **/
    public function locations(){
        return $this -> hasMany('App\Location');
    }
}
