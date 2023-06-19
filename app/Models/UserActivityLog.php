<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class UserActivityLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_activity_logs';

    protected $guarded = [];

    public function users() {
    	return $this->belongsTo(User::class);
    }
}
