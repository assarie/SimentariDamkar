<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'item_id',
        'transaction_type',
        'quantity',
        'transaction_date',
        'user_id',
    ];

    
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
