<?php

namespace App\Models;

use App\Models\Mutualist;
use App\Models\AmountYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public function mutualist()
    {
        return $this->belongsTo(Mutualist::class);
    }

    public function amountYear()
    {
        return $this->belongsTo(AmountYear::class);
    }

   
}
