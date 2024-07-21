<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
