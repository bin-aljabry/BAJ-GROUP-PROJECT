<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TillCapital extends Model
{
   use HasFactory;

    protected $fillable = ['teller_capital_id', 'till_name', 'amount'];

    public function tellerCapital()
    {
        return $this->belongsTo(TellerCapital::class);
    }
}
