<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;

    protected $fillable=['name','description','stok','harga'];

    public function produk():BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksi_detail():HasMany
    {
        return $this->hasMany(detiltransaksi::class);
    }
}

