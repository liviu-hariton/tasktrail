<?php

namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Http\Requests\UserRequest;
use App\Traits\FileUpload;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

#[AllowDynamicProperties] class User extends Controller
{
    use FileUpload, MustVerifyEmail;

    public function index()
    {
        return view('sections.users.index');
    }

    public function create()
    {
        return view('sections.users.create');
    }

    /**
     * Store a newly created user
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        // Validate the request data
        $validated = $request->validated();

        // Upload the avatar file and get its path
        $avatar_path = $this->uploadFile($request, 'avatar', 'avatars', 'public');

        // Create a new user with the validated data
        $user = \App\Models\User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'is_active' => $validated['is_active'],
        ]);

        // Mark the user's email as verified
        $user->markEmailAsVerified();

        // Create a profile for the user with the validated data and avatar path
        $user->profile()->create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'phone' => $validated['phone'],
            'avatar' => $avatar_path,
        ]);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
