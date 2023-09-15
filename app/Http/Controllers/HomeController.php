<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function edit()
    {
        $page_title = 'Profile'; 
        return view('admin.profile',compact('page_title'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Update the user's profile information
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('profile_pic')) {
            // Upload the profile picture to storage
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public');
            $user->profile_pic = $profilePicPath;
        }

        $user->save();

        // Redirect to the profile edit page with a success message
        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
