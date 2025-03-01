<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = ['user_id', 'name' , 'number'];

    public function profiles(){
        return $this->hasMany(Profiles::class, 'user_id');
    }
}
