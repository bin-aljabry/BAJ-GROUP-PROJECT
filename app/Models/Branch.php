<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'company_branches';

    protected $fillable = [
       'company_id', 'name', 'location'
    ];

    public function company()
{
    return $this->belongsTo(company::class);
}

public function users()
{
    return $this->hasMany(User::class);
}
}
