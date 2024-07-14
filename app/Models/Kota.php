<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
