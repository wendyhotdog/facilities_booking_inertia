<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    protected $appends = ['receipt_image_url'];
    use HasFactory;

    public function getReceiptImageUrlAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
