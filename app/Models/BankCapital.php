<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCapital extends Model
{
   use HasFactory;

    protected $fillable = ['teller_capital_id', 'bank_name', 'account_number', 'amount'];
    public function tellerCapital()
{
    return $this->belongsTo(TellerCapital::class);
}

// In TellerCapital.php
public function bankCapitals()
{
    return $this->hasMany(BankCapital::class);
}

public function branchCapital()
{
    return $this->belongsTo(BranchCapital::class);
}
}
