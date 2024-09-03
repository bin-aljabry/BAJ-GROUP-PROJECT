<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till_transaction extends Model
{
    use HasFactory;
    protected $table = 'till_transactions';

    protected $fillable = [
       'teller_name','customer_name','phone','userId','slug','amount','transaction_id','till_number','type','teller_till_id','agent_branch_teller_id','till_type'
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
