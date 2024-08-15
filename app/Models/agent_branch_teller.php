<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent_branch_teller extends Model
{
    use HasFactory;

    protected $table = 'agent_branch_tellers';

    protected $fillable = [
   'name','number','email','phone','address','slug','user_id','agent_branch_id'
    ];



    public function agent_branch()
    {
        return $this->belongsTo(agent_branch::class,'agent_branch_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
