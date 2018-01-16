<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table='response';

    public function options()
    {
    	return $this->hasMany(Response_option::class,'response_id');
    }
}
