<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use App\Http\Requests\UserRequest;
use App\Traits\FileUpload;
use App\Traits\Overall;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class User extends Controller
{
    use FileUpload, MustVerifyEmail, Overall;

    public function index()
    {
        $users = UserModel::with('profile')->paginate($this->getPerPageOption());

        return view('sections.users.index', [
            'users' => $users,
            'Users_count' => UserModel::count()
        ]);
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
        $user = UserModel::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'is_active' => $validated['is_active'] ?? 0,
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

    public function edit(UserModel $user)
    {
        return view('sections.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UserRequest $request, UserModel $user)
    {
        // Validate the request data
        $validated = $request->validated();

        // Check if a new avatar file is uploaded
        if ($request->hasFile('avatar')) {
            // Delete the old avatar file if it exists
            if($user->profile->avatar) {
                Storage::disk('public')->delete($user->profile->avatar);
            }

            // Upload the new avatar file and get its path
            $avatar_path = $this->uploadFile($request, 'avatar', 'avatars', 'public');
        } else {
            // Keep the existing avatar path
            $avatar_path = $user->profile->avatar;
        }

        // Update the user's data
        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'is_active' => $validated['is_active'] ?? 0,
        ]);

        // Update the user's profile data
        $user->profile()->update([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'phone' => $validated['phone'],
            'avatar' => $avatar_path,
        ]);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }
}
