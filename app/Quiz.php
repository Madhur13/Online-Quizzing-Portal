<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table='quiz';

    public function questions()
    {
    	return $this->hasMany(Question::class,'quiz_id');
    }

    public function addquestion(Question $question)
    {
    	$this->questions()->save($question);
    }
}
