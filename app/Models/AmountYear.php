<?php

namespace App\Models;

use App\Models\Year;
use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmountYear extends Model
{
    use HasFactory;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
