<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $fillable = ['firstName','lastName','companyName','address','email','mobile','password','otp'];
    protected $attributes = [
        'otp'=> '0'
    ];
}
