<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'type', 'message'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
