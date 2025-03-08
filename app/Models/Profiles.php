<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Profiles extends Model
{
    protected $fillable = ['user_id', 'name' , 'number'];

    public function profiles(){
        return $this->hasMany(Profiles::class, 'user_id');
    }



    public function category():BelongsTo{
        return $this->belongsto(Category::class);
    }
}
