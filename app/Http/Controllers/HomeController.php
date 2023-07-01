<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        if (Auth::check() && Auth::user()->hasRole(3)) {
            return redirect()->route('ngodeng.index');
        }
        return view('pages.ngodeng.index');
    }

    public function search(Request $request) {
        dd($request->all());
    }

    public function validateModal(Request $request, $table)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function previewOnModal($directory, $file)
    {
        $path = storage_path('app\\public\\' . $directory . '\\' . $image);
        if (file_exists($path)) {
            return response()->file($path);
        }
        return response()->file(public_path('img\\default.png'));
    }

    public function previewImage($directory, $image)
    {
        $path = storage_path('app\\public\\' . $directory . '\\' . $image);

        $response = [
            'code' => 301,
            'url' => asset('img/default.png')
        ];

        if (file_exists($path)) {
            $response = [
                'code' => 200,
                'url' => asset('storage/' . $directory . '/' . $image)
            ];
        }

        return response()->json($response);
    }
}
