<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response_option extends Model
{
    protected $table='response_option';

    public function response()
    {
    	return $this->belongsTo(Response::class,'response_id');
    }
}
