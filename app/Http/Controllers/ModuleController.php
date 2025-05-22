<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::latest()->paginate(10);
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_name' => ['required', 'string', 'max:255'],
        ]);

        Module::create($validated);

        Alert::success('Success', 'Module created successfully!');
        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('admin.modules.form', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $data = $request->validate([
            'module_name' => ['required', 'string', 'max:255'],

        ]);

        $module->update($data);

        Alert::success('Success', 'Module updated successfully!');
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        Alert::success('Deleted', 'Module deleted successfully!');
        return redirect()->route('modules.index');
    }

    public function togglestatus(Module $module)
    {
        $module->status = !$module->status;
        $module->save();
        return back();
    }
}
