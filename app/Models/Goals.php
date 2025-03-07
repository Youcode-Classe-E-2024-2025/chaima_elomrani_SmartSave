<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Goals extends Model
{
    use HasFactory; 

    protected $fillable = [
        'category_id',
        'name', 
        'description', 
        'current_amount', 
        'target_amount', 
        'target_date', 
    ];

    public function category():BelongsTo{
        return $this->belongsto(Category::class);
    }
}
