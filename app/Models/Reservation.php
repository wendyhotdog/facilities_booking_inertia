<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
