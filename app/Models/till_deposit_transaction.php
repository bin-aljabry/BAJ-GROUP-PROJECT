<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till_deposit_transaction extends Model
{
    use HasFactory;
    protected $table = 'till_deposit_transaction';

    protected $fillable = [
       'name','transaction_id','type', 'amount','slug','date','agent_branch_teller_id','teller_till_id','userId'
    ];

    public function teller_till()
    {
        return $this->belongsTo(teller_till::class,'teller_till_id');

    }

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');
    }
}
