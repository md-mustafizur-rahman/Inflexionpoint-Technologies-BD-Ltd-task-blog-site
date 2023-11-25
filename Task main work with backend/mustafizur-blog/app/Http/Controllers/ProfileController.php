<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $userData = $request->validated();

        // Check if a new profile image is provided
        if ($request->hasFile('profile_image')) {
            // Store the profile image in the storage folder with a unique name
            $profileImage = $request->file('profile_image');
            $imageName = uniqid('profile_', true) . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->storeAs('profile_images', $imageName, 'public');

            // Delete the previous profile image if exists
            if ($user->image) {
                Storage::disk('public')->delete('profile_images/' . $user->image);
            }

            // Save the new profile image name to the database
            $user['image'] = $imageName;
        }

        $user->fill($userData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     // Delete the user's profile image from storage if it exists
    //     if ($user->profile_image) {
    //         Storage::delete('profile_images/' . $user->profile_image);
    //     }

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
