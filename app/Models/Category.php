<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $guarded = [];

    public function products() {
    	return $this->belongsToMany(Product::class, 'product_categories');
    }

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
