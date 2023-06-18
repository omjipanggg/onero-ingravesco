<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spotify, SpotifySeed;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.homepage.index');
    }

    public function ngodengIndex()
    {
        // Alert::success('Sukses', 'Anda berhasil masuk.')->autoClose(false);
        return view('pages.ngodeng.index');
    }

    public function search(Request $request) {
        dd($request->all());
    }
}
