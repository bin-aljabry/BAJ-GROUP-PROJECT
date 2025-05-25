<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'phone',
        'brand',
        'email',
        'slug',

        'address',
    ];
    public function branches()
    {
        return $this->hasMany(company_branches::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function admin()
{
    return $this->hasOne(User::class)->whereHas('roles', function ($q) {
        $q->where('name', 'admin');
    });
}

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
