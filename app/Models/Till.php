<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class till extends Model
{
    use HasFactory;

     protected $fillable = [
        'company_id',
        'branch_id',
     
 'teller_id',
        'created_by',
        'till_phone_no',
        'till_name',
        'network_provider',
        'till_code',
        'till_type',
        'status',
    ];

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
        return $this->belongsTo(User::class);
    }
       public function tillCapitals()
    {
        return $this->hasMany(TillCapital::class);
    }
 public function teller()
    {
        return $this->belongsTo(User::class, 'teller_id');
    }
}
