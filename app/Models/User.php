<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phonenumber',
        'company_id',
        'created_by',
        'provider_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function createdUsers()
{
    return $this->hasMany(User::class, 'created_by');
}

    public function branch()
    {
        return $this->belongsTo(company_branches::class);
    }
}
