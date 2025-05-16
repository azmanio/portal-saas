<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $title = 'Apa kamu yakin?';
        $text = "Data yang dihapus tidak dapat dikembalikan lagi";
        confirmDelete($title, $text);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:admin,user',
            'phone' => 'nullable|string|max:20',
            'institution_name' => 'nullable|string|max:255',
            'legality_no' => 'nullable|string|max:50',
            'institution_type' => 'nullable|in:laz,ngo',
            'core_program' => 'nullable|string',
            'employee_qty' => 'nullable|numeric',
        ]);

        User::create($validated);

        Alert::success('Success', 'User created successfully!');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:admin,user',
            'phone' => 'nullable|string|max:20',
            'institution_name' => 'nullable|string|max:255',
            'legality_no' => 'nullable|string|max:50',
            'institution_type' => 'nullable|in:laz,ngo',
            'core_program' => 'nullable|string',
            'employee_qty' => 'nullable|numeric',
        ]);

        if ($data['password'] == "") {
            unset($data['password']);
        }

        $user->update($data);

        Alert::success('Success', 'User updated successfully!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Deleted', 'User deleted successfully!');
        return redirect()->route('user.index');
    }

    public function togglestatus(User $user)
    {
        if ($user->email == 'admin@saas.com') {
            return redirect()->route('user.index')->withErrors([
                'status' => 'Tidak dapat mengubah status Super Admin!',
            ]);
        }
        $user->status = !$user->status;
        $user->save();
        return back();
    }
}
