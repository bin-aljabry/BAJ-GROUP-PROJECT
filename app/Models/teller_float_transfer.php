<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_float_transfer extends Model
{
    use HasFactory;

    protected $table = 'teller_float_transfers';

    protected $fillable = [
     'slug','date', 'amount', 'transaction_id','to_network_type', 'to_till_number', 'network_type','till_number','amount','slug','teller_till_id','branch_capital_id'
    ];

    public function teller_till()
    {
        return $this->belongsTo(teller_till::class,'teller_till_id');

    }

    public function till_transaction()
    {
        return $this->belongsTo(till_transaction::class,'till_transaction_id');
    }
}
