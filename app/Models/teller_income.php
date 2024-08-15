<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_income extends Model
{
    use HasFactory;

    protected $table = 'teller_incomes';

    protected $fillable = [
        'amount','slug','date','agent_branch_teller_id','agent_branch_id'
    ];

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');

    }

    public function agent_branch()
    {
        return $this->belongsTo(agent_branch::class,'agent_branch_id');
    }
}
