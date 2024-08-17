<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till_transaction extends Model
{
    use HasFactory;
    protected $table = 'till_transactions';

    protected $fillable = [
       'teller_name','customer_name','phone','slug',,'amount','transaction_id','till_number','date','type','date','teller_till_id','agent_branch_teller_id'
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
