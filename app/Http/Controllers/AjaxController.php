<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;

use App\Models\Order;
use App\Models\Visitor;

class AjaxController extends Controller
{
    public function tableOrderByCategories($categories) {
    	return DataTables::of(Order::byCategories($categories))->make(true);
    }

    public function storeVisitor(Request $request) {
    	$visitor = Visitor::create([
    		'name' => $request->input('name') ?? null,
    		'agent' => $request->input('agent') ?? null
    	]);

    	return response()->json([
    		'code' => 200,
    		'visitor' => $visitor
    	]);
    }
}
