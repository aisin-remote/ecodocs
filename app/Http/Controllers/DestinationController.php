<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use Illuminate\Http\Request;


class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.website.destination.index');
    }
    public function getData(Request $request)
    {
        // Mengambil semua data limbah
        $destination = Destination::all();
        return response()->json($destination); // Kembalikan data dalam format JSON
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
    public function store(StoreDestinationRequest $request)
    {
        $request->validate([
            'repeater-group.*.name' => 'required|string|max:255',
        ]);

        // Simpan setiap item dari repeater
        foreach ($request->input('repeater-group') as $item) {
            Destination::create([
                'name' => $item['name'],
            ]);
        }

        // Redirect atau response setelah penyimpanan sukses
        return redirect()->back()->with('success', 'Destination data successfully saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Destination $destination)
    {
        $destination = Destination::findOrFail($request->id);
        return response()->json($destination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $limbah = Limbah::findOrFail($id); // Menemukan data limbah berdasarkan ID
        $limbah->update($validated); // Mengupdate data limbah

        return response()->json(['message' => 'Limbah berhasil diperbarui!', 'data' => $limbah]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
