<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
   'expenditure','amount','paye','date','remark','slug','approval','voucher_no',
    ];


}
