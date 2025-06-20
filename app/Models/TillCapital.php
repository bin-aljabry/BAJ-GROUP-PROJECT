<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TillCapital extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id',
        'teller_id',
        'till_id',
        'amount',
        'capital_type',
        'remarks',
    ];

    /**
     * Manager aliyetoa capital
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Teller anayepokea capital
     */
    public function teller()
    {
        return $this->belongsTo(User::class, 'teller_id');
    }

    /**
     * Till inayopokea capital
     */
    public function till()
    {
        return $this->belongsTo(Till::class, 'till_id');
    }
}
