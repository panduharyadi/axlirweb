<?php

namespace App\Models;

use App\Models\Provinsi;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

}
