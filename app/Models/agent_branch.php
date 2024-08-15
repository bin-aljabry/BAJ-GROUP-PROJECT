<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent_branch extends Model
{
    use HasFactory;

    protected $table = 'agent_branches';

    protected $fillable = [
    'name','number', 'location','slug','company_id'
    ];


    public function company()
    {
        return $this->belongsTo(company::class,'company_id');
    }

}
