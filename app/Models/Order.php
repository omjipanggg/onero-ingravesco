<?php

namespace App\Models;

// use App\Traits\HasUuids;
use App\Traits\UserInCharge;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

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

    public function scopeThisWeek($query) {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
        ]);
    }

    public function scopeWeeklyOrderCounts($query, $categories) {
        if (!is_array($categories)) { $categories = [$categories]; }

        return $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->with('details', function($query) use($categories) {
                $query->with('categories', function($query) use($categories) {
                    return $query->whereIn('category_id', $categories);
                });
            })
            ->orderBy('created_at')->get()
            ->groupBy(function ($order) {
                return $order->created_at->format('l');
            })->map(function ($groupedOrders) {
            return $groupedOrders->count();
        });
    }

    public function scopeWeeklyAllOrderCounts($query) {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        return $query->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at')->get()
            ->groupBy(function ($order) {
                return $order->created_at->format('l');
            })->map(function ($groupedOrders) {
            return $groupedOrders->count();
        });
    }

    public function scopeLastWeek($query) {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->subWeek(), Carbon::now()->endOfWeek()->subWeek()
        ]);
    }

    public function scopeLastMonth($query) {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->subMonthsNoOverflow(), Carbon::now()->endOfMonth()->subMonthsNoOverflow()
        ]);
    }

    public function scopeWithinDateRange($query, $start, $end) {
        return $query->whereBetween('created_at', [$start, $end]);
    }
}
