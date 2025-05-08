<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the units.
     */
    public function index()
    {
        $units = Unit::orderBy('id', 'desc')->get();
        return view('dashboard.pages.units', compact('units'));
    }

    /**
     * Store a newly created unit in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Unit::create([
            'name' => $request->name,
            'status' => 1 // default active
        ]);

        return redirect()->back()->with('success', 'Unit added successfully.');
    }

    /**
     * Update the specified unit in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified unit from storage.
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully.');
    }
}
