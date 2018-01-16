<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='questions';
    protected $primary_key='id';

    public function options()
    {
    	return $this->hasMany(Option::class,'question_id');
    }

    public function quiz()
    {
    	return belongsTo(Quiz::class,'quiz_id');
    }

    public function addoption(Option $option)
    {
    	$this->options()->save($option);
    }
}
