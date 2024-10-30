<?php

namespace App\Http\Controllers;

use App\Models\Limbah;
use App\Http\Requests\StoreLimbahRequest;
use App\Http\Requests\UpdateLimbahRequest;
use Illuminate\Http\Request;

class LimbahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limbah = Limbah::all(); // Mengambil semua data limbah
        return view('pages.website.limbah.index', compact('limbah'));
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
        $request->validate([
            'repeater-group.*.code' => 'required|string|max:50',
            'repeater-group.*.name' => 'required|string|max:255',
        ]);

        // Simpan setiap item dari repeater
        foreach ($request->input('repeater-group') as $item) {
            Limbah::create([
                'code' => $item['code'],
                'name' => $item['name'],
            ]);
        }

        // Redirect atau response setelah penyimpanan sukses
        return redirect()->back()->with('success', 'Waste data successfully saved.');
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
    public function edit(Request $request, Limbah $limbah)
    {
        $limbah = Limbah::findOrFail($request->id);
        return response()->json($limbah);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLimbahRequest $request, Limbah $limbah, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $limbah = Limbah::findOrFail($id); // Menemukan data limbah berdasarkan ID
        $limbah->update($validated); // Mengupdate data limbah

        return redirect()->back()->with('success', 'Waste data successfully saved.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Limbah $limbah, $id)
    {
        try {
            $limbah = Limbah::findOrFail($id);
            $limbah->delete();

            return response()->json(['success' => 'Limbah deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Limbah.'], 500);
        }
    }
    public function getData(Request $request)
    {
        // Mengambil semua data limbah
        $limbah = Limbah::all();
        return response()->json($limbah); // Kembalikan data dalam format JSON
    }
}
