<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;

use App\Models\Order;

class AjaxController extends Controller
{
    public function tableOrderByCategories($categories) {
    	return DataTables::of(Order::byCategories($categories))->make(true);
    }
}
