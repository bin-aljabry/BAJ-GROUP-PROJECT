<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'branch_id',
        'user_id',
        'teller_name',
        'account_name',
        'bank_name',
        'account_number',
        'created_by',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function branch()
    {
        return $this->belongsTo(company_branches::class, 'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teller()
    {
        return $this->belongsTo(User::class, 'teller_name');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
