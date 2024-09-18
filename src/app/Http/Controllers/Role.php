<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Traits\Overall;
use Illuminate\Http\Request;
use App\Models\Role as RoleModel;

class Role extends Controller
{
    use Overall;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = RoleModel::paginate($this->getPerPageOption());

        return view('sections.roles.index', [
            'roles' => $roles,
            'roles_count' => RoleModel::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();

        // Create a new user with the validated data
        $user = RoleModel::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        // Redirect to the roles index page with a success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
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
    public function edit(RoleModel $role)
    {
        return view('sections.roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
