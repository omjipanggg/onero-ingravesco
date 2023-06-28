<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class NgodengController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $filter = 7;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'partners']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = $this->filter;

        $products = Product::whereHas('categories', function($query) use($filter) {
                $query->where('category_id', $filter);
            })->orderBy('name')->get();

        $users = User::whereHas('roles', function($query) {
            $query->where('role_id', 3);
        })->get();

        $context = [
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
