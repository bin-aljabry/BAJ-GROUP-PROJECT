<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till_float extends Model
{
    use HasFactory;
    protected $table = 'till_floats';

    protected $fillable = [
        'date', 'userId','slug','amount','transaction_id','till_number','network_type','teller_till_id','agent_branch_teller_id'
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
