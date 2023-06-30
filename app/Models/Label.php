<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'labels';

    protected $guarded = [];

    public function creator() {
    	return $this->belongsTo(User::class, 'created_by');
    }

    public function editor() {
    	return $this->belongsTo(User::class, 'updated_by');
    }

    public function eraser() {
    	return $this->belongsTo(User::class, 'deleted_by');
    }
}
