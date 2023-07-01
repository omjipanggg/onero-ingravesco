<?php

namespace App\Models;

// use App\Traits\HasUuids;
use App\Traits\UserInCharge;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes, UserInCharge;

    protected $table = 'products';

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
        'active' => 'boolean'
    ];

    public function sales() {
        return $this->belongsToMany(Order::class, 'order_products')->orderByDesc('created_at')->withPivot(['quantity']);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'product_categories')->orderBy('categories.name');
    }

    public function hasCategory($id) {
        if (!is_array($id)) { $id = [$id]; }
        return $this->categories()->whereIn('category_id', $id)->exists();
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
