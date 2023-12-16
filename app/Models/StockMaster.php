<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMaster extends Model
{
    use HasFactory;

    protected $table = 'stock_master';
    protected $primaryKey = 'stock_master_id';

    protected $fillable = [
        'stock_master_id',
        'user_id',
        'status_id',
        'amount',
        'lang',
        'lang_id',
    ];

}
