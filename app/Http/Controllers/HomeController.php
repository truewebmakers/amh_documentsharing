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
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // dd($request->file('profile_pic'));


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
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->company = $request->input('company');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('profile_pic')) {
            // Upload the profile picture to storage
            $image = $request->file('profile_pic');
            $imageName =time() . 'profile.' . $image->getClientOriginalExtension();
            Storage::disk('s3')->put('profile/' . $imageName, file_get_contents($image)); 
            $user->profile_pic = $imageName;
        }

        $user->save();

        // Redirect to the profile edit page with a success message
        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
