<?php

namespace App\Models;

use App\Models\AmountYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;

    public function amountYear()
    {
        return $this->hasOne(AmountYear::class);
    }
}
