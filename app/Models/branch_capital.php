<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch_capital extends Model
{
   use HasFactory;

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
        return $this->belongsTo(company_branches::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
