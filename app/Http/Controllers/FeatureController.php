<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Module;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::with('module')->latest()->paginate(10);
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.feature.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'feature_name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Feature::create($validated);

        Alert::success('Success', 'Feature created successfully');
        return redirect()->route('feature.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        $modules = Module::all();
        return view('admin.feature.edit', compact('feature', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'module_id' => 'sometimes|exists:modules,id',
            'feature_name' => 'sometimes|string|max:255',
            'description' => 'required|string'
        ]);

        $feature->update($data);

        Alert::success('Success', 'Feature updated successfully!');
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        Alert::success('Deleted', 'Feature deleted successfully!');
        return redirect()->route('feature.index');
    }

    public function togglestatus(Feature $feature)
    {
        $feature->status = !$feature->status;
        $feature->save();
        return back();
    }
}
