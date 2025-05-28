<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TillCapital extends Model
{
    use HasFactory;

    public function manager() {
    return $this->belongsTo(User::class, 'manager_id');
}

public function branchCapital() {
    return $this->belongsTo(BranchCapital::class);
}

public function tills() {
    return $this->hasMany(TillCapital::class);
}

public function banks() {
    return $this->hasMany(BankCapital::class);
}

public function cash() {
    return $this->hasOne(CashCapital::class);
}
}
