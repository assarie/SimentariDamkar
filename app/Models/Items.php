<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'qr_code',
        'qr_path',
        'stock',
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class, 'item_id');
    }
}
