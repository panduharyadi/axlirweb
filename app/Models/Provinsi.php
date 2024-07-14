<?php

namespace App\Models;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
