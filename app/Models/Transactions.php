<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory;
  
    protected $table = 'transactions';

    protected $fillable = [
        'user_id', 
        'description', 
        'amount', 
        'type', 
        'category_id', 
        'transaction_date'
    ];

    public function category():BelongsTo{
        return $this->belongsto(Category::class);
    }
}
