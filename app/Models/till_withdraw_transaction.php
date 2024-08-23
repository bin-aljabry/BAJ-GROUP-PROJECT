<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till_withdraw_transaction extends Model
{
    use HasFactory;
    protected $table = 'till_withdraw_transaction';

    protected $fillable = [
    'transaction_id','type', 'amount','slug','date','agent_branch_teller_id','teller_till_id','till_transaction_id','userId'
    ];

    public function teller_till()
    {
        return $this->belongsTo(teller_till::class,'teller_till_id');

    }

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');
    }
    public function till_transaction()
    {
        return $this->belongsTo(till_transaction::class,'till_transaction_id');
    }
}
