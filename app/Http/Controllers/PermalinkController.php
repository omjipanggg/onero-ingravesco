<?php

namespace App\Http\Controllers;

use App\Models\Permalink;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class PermalinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Permalink::orderBy('name')->get();

        $context = [
            'links' => $links
        ];

        return view('pages.link.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required'
        ]);
        Permalink::create($request->all());
        Alert::success('Done', 'Link added!');
        return redirect()->route('link.index')->with([
            'code' => 200,
            'status' => 'New link has been added.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permalink $permalink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permalink $permalink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permalink $permalink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permalink $permalink)
    {
        //
    }
}
