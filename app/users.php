<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class users extends Model
{
    use EntrustUserTrait; // add this trait to your user model

    protected $table = 'login';
    protected $primaryKey = 'username';
    public $incrementing = false;
}