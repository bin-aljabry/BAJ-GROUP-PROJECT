<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\company_branches;

class BranchCapital extends Model
{
   use HasFactory;
protected $casts = [
    'created_at' => 'datetime',
    'approved_at' => 'datetime',
];
    protected $fillable = [
        'company_id',
        'branch_id',
        'amount',
        'created_by',
        'approved_by',
        'status',
        'approved_at',

    ];
 public function branch()
    {
        return $this->belongsTo(company_branches::class, 'branch_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
