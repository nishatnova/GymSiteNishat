<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class TraineeDashboardController extends Controller
{
    public function index()
    {
        $trainee = Auth::user()->trainee;
        return view('trainee.home.index', compact('trainee'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'mobile' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        // Get the logged-in user and corresponding trainee profile
        $user = Auth::user();
        $trainee = $user->trainee;

        // Update trainee-specific information
        $trainee->mobile = $request->mobile;
        $trainee->gender = $request->gender;
        $trainee->date_of_birth = $request->date_of_birth;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($trainee->image && file_exists(public_path($trainee->image))) {
                unlink(public_path($trainee->image));
            }
            // Upload the new image
            $imagePath = imageUpload($request->file('image'), 'admin/upload/trainee-img/');
            $trainee->image = $imagePath;
        }

        // Save the updated trainee profile
        $trainee->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
