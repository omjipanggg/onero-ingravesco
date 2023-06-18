<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $guarded = [];

    public function users() {
    	return $this->belongsToMany(User::class, 'role_users')->withPivot(['expire_date']);
    }
}
