<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_cash extends Model
{
    use HasFactory;
    protected $table = 'teller_cashes';

    protected $fillable = [
        'amount','slug','agent_branch_teller_id'
    ];

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');

    }

   
}
