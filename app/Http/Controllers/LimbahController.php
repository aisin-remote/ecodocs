<?php

namespace App\Http\Controllers;

use App\Models\Limbah;
use App\Http\Requests\StoreLimbahRequest;
use App\Http\Requests\UpdateLimbahRequest;

class LimbahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.website.limbah.index');
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
    public function store(StoreLimbahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Limbah $limbah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Limbah $limbah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLimbahRequest $request, Limbah $limbah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Limbah $limbah)
    {
        //
    }
}
