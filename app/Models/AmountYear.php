<?php

namespace App\Models;

use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmountYear extends Model
{
    use HasFactory;

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
