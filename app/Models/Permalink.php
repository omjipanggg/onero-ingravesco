<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permalink extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permalinks';
    protected $guarded = [];

    protected $casts = [
    	'active' => 'boolean'
    ];
}
