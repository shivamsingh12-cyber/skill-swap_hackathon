<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileEditController extends Controller
{
    public function ShowProfile(Request $request)
    {
        $user = User::with(['skills_offered', 'skills_wanted'])->find(Auth::id());
         $allSkills = Skill::all();
        return view('profiles.edit',compact('user','allSkills'));

    }
 public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'location' => 'nullable|string|max:255',
        'availability' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'skills_offered' => 'array|nullable',
        'skills_offered.*' => 'exists:skills,id',
        'skills_wanted' => 'array|nullable',
        'skills_wanted.*' => 'exists:skills,id',
    ]);

    $user = Auth::user();

    // Update user basic info
    $user->name = $request->name;
    $user->email = $request->email;
    $user->location = $request->location;
    $user->availability = $request->availability;

    // Handle profile image upload
    if ($request->hasFile('image')) {
        if ($user->image) {
            Storage::delete('public/' . $user->image);
        }

        $path = $request->file('image')->store('profile_images', 'public');
        $user->image = $path;
    }

    $user->save();

    // Update skills (pivot tables)
    $user->skills_offered()->sync($request->input('skills_offered', []));
    $user->skills_wanted()->sync($request->input('skills_wanted', []));

    return redirect()->route('homepage')->with('success', 'Profile updated successfully.');
}
}
