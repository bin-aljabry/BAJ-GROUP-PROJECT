<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_till extends Model
{
    use HasFactory;

    protected $table = 'teller_tills';

    protected $fillable = [
        'name','slug','number','type','agent_branch_teller_id'
    ];

    public function agent_branch_teller()
    {
        return $this->belongsTo(agent_branch_teller::class,'agent_branch_teller_id');

    }


}
