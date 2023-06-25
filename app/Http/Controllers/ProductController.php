<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

use App\Helpers\ActivityLog;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
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
            'products' => Product::orderBy('name')->get()
        ];
        return view('pages.ngodeng.products', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $context = [
            'categories' => Category::orderBy('name')->get()
        ];
        return view('pages.ngodeng.forms.product-new', $context);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;

        $realMoney = Str::replace('.', '', $request->price);

        if ($request->hasFile('image')) {
            $filename = Str::slug($request->name, '-') . '.' . $request->file('image')->getClientOriginalExtension();
            $product->image = $filename;
            $uploaded = $request->file('image')->storeAs('ngodeng/products/', $filename, 'public');
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $realMoney;
        $product->save();

        if (count($request->categories) > 0) {
            foreach ($request->categories as $cats) {
                if (is_numeric($cats)) {
                    $product->categories()->attach($cats);
                } else {
                    $category = Category::create(['name' => $cats]);
                    $product->categories()->attach($category);
                }
            }
        }

        ActivityLog::logging('Product added—' . $product->id);
        Alert::success('Success', 'Product added successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $context = [
            'record' => Product::findOrFail($id),
            'categories' => Category::orderBy('name')->get()
        ];
        return view('pages.ngodeng.forms.product-edit', $context);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $realMoney = Str::replace('.', '', $request->price);

        if ($request->hasFile('image')) {
            $filename = Str::slug($request->name, '-') . '.' . $request->file('image')->getClientOriginalExtension();
            if ($product->image != 'default.png') {
                unlink(storage_path('app\\public\\ngodeng\\products\\' . $product->image));
            }
            $product->image = $filename;
            $uploaded = $request->file('image')->storeAs('ngodeng/products/', $filename, 'public');
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $realMoney;
        $product->save();

        $product->categories()->detach();
        foreach ($request->categories as $cats) {
            if (is_numeric($cats)) {
                $product->categories()->attach($cats);
            } else {
                $category = Category::create(['name' => $cats]);
                $product->categories()->attach($category);
            }
        }

        ActivityLog::logging('Product updated—' . $id);
        Alert::success('Success', 'Product updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request, $id)
    public function destroy($id)
    {
        $data = Product::findOrFail($id)->delete();
        ActivityLog::logging('Product deleted—' . $id);
        // if ($request->ajax()) {
        $response = ['success' => false, 'code' => 301];
        if ($data) {
            $response = ['success' => true, 'code' => 200];
        }
        return response()->json($response);
        // }
        // Alert::success('Success', 'Product deleted successfully.');
        // return back();
    }
}
