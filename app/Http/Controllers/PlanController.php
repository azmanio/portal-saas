<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::latest()->paginate(10);
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('admin.plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusOptions = Plan::getStatusOptions();
        return view('admin.plan.form', compact('statusOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'user_qty' => 'required|integer|min:1',
            'status' => 'required|in:0,1,2,3',
        ]);

        Plan::create($validated);

        Alert::success('Success', 'Plan created successfully!');
        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $statusOptions = Plan::getStatusOptions();
        return view('admin.plan.form', compact('plan', 'statusOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'user_qty' => 'required|integer|min:1',
            'status' => 'required|in:0,1,2,3',
        ]);

        $plan->update($validated);

        Alert::success('Success', 'Plan updated successfully!');
        return redirect()->route('plan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        Alert::success('Deleted', 'Plan deleted successfully!');
        return redirect()->route('plan.index');
    }
}