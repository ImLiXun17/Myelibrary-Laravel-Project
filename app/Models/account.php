<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Account extends Authenticatable implements AuthenticatableContract
{
    protected $table = 'account';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['admin_username','admin_email','admin_password'];
}
