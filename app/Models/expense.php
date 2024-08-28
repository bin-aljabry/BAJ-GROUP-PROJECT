<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
   'expenditure','amount','paye','date','remark','slug','approval','voucher_no','agent_branch_teller_id','agent_branch_id'
    ];



    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');

    }

    public function agent_branch()
    {
        return $this->belongsTo(agent_branch::class,'agent_branch_id');
    }
    public function expenses()
    {
        return $this->belongsTo(expenses_category::class,'expenses');
    }
}
