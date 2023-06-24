<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class NgodengController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'partners']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $context = [
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
        $context = [
            'products' => Product::with(['categories' => function($query) {
                $query->orderBy('categories.name');
            }])->orderBy('name')->get()
        ];
        return view('pages.ngodeng.products', $context);
    }

    public function sales() {
        return view('pages.ngodeng.sales');
    }
}
