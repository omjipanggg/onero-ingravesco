<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class NgodengController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $filter = 3;

    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'partners']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = $this->filter;

        $products = Product::with('sales')->whereHas('categories', function($query) use($filter) {
                $query->where('category_id', $filter);
            })->orderBy('name')->get();

        $orders = Order::all();

        $users = User::all();
        // $users = User::whereHas('roles', function($query) {
            // $query->where('role_id', 3);
        // })->get();

        $context = [
            'orders' => $orders,
            'products' => $products,
            'users' => $users
        ];
        return view('pages.ngodeng.dashboard', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = 'public\\ngodeng\\order.json';

        Storage::put($path, json_decode(json_encode($request->orders)), true);

        $orderString = json_decode(Storage::get($path), true);

        $order = new Order;
        $order->count_sales = $orderString['count'];
        $order->total_sales = $orderString['subtotal'];
        $order->save();

        foreach ($orderString['items'] as $key => $value) {
            $order->details()->attach($value['id'], [
                'quantity' => $value['count']
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'code' => 200,
                'success' => true
            ]);
        }

        Alert::success('Completed', 'Checked out successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::byCategories(3)->where('id', $id)->first();
        $context = [
            'order' => $order
        ];
        return view('pages.ngodeng.sales-history-detail', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function products() {
        $filter = $this->filter;
        $products = Product::with(['categories' => function($query) {
            $query->orderBy('categories.name');
        }])->whereHas('categories', function($query) use($filter) {
            $query->where('category_id', $filter);
        })->orderBy('name')->get();

        $context = [
            'products' => $products
        ];
        return view('pages.ngodeng.products', $context);
    }

    public function sales() {
        $filter = $this->filter;
        $products = Product::with(['categories' => function($query) {
                $query->orderBy('categories.name');
            }])->whereHas('categories', function($query) use($filter) {
                $query->where('category_id', $filter);
            })->where('active', true)->orderBy('name')->get();
        $context = [
            'products' => $products
        ];
        return view('pages.ngodeng.sales', $context);
    }

    public function salesHistory() {
        $context = [
            'columns' => Schema::getColumnListing('orders')
        ];
        return view('pages.ngodeng.sales-history', $context);
    }

    public function fetchWeeklySales() {
        $orderCounts = Order::weeklyOrderCounts($this->filter);
        return response()->json($orderCounts);
    }
}
