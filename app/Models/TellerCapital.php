<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TellerCapital extends Model
{
    protected $fillable = ['branch_capital_id', 'manager_id', 'teller_id', 'amount'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, 'teller_id');
    }

    public function branchCapital()
    {
        return $this->belongsTo(BranchCapital::class);
    }
    public function cashCapitals()
{
    return $this->hasMany(CashCapital::class);
}

public function bankCapitals()
{
    return $this->hasMany(BankCapital::class);
}

public function tillCapitals()
{
    return $this->hasMany(TillCapital::class);
}
}
