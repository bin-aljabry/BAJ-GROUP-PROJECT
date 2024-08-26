<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_capital extends Model
{
    use HasFactory;
    protected $table = 'teller_capitals';

    protected $fillable = [
        'amount','slug','category','userId','agent_branch_teller_id','branch_capital_id'
    ];

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');

    }


}

