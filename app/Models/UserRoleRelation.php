<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleRelation extends Model
{
    use HasFactory;
    protected $fillable = ['role_id','user_id'];
}
