<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses_category extends Model
{
    use HasFactory;
    protected $table = 'expenses_categories';

    protected $fillable = [
    'category','number','userId','name','slug',
    ];
}
