<?php

namespace App\Models;

// use App\Traits\HasUuids;
use App\Traits\UserInCharge;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, HasUuids, SoftDeletes, UserInCharge;

    protected $table = 'orders';

    protected $guarded = [];

    protected $casts = [
    	'id' => 'string'
    ];

    public function details() {
    	return $this->belongsToMany(Product::class, 'order_products')->orderByDesc('created_at')->withPivot(['quantity']);
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
