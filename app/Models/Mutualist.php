<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mutualist extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }


    public function amounts()
    {
        return $this->hasMany(Transaction::class);
    }

    // Calculer le solde
    public function getBalance()
    {
        return $this->amounts()->sum('amount');
    }

    // Calculer le reste à payer pour une année spécifique
    public function getRemainingAmountForYear($year)
    {
        $totalAmountForYear = AmountYear::where('year', $year)->amount;
        $paidAmountForYear = $this->amounts()->whereYear('created_at', $year)->sum('amount');

        return $totalAmountForYear - $paidAmountForYear;
    }
    
}
