<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teller_till extends Model
{
    use HasFactory;

    protected $table = 'teller_tills';

    protected $fillable = [
        'name','slug','number','type','agent_branch_teller_id','userId'
    ];

    public function company() { return $this->belongsTo(Company::class); }
    public function transactions() { return $this->hasMany(Transaction::class); }
    public function cashiers() { return $this->belongsToMany(User::class, 'cashier_tills'); }
    

}
