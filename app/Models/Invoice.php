<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'address',
        'total',
    ];

    public function boughts()
    {
        return $this->hasMany(Bought::class);
    }
}
