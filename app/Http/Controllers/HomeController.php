<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User; 
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
            'company_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            // 'alternative_phone' => 'required',
            // 'company_address' => 'required|string|max:255',
            // 'street_address' => 'required|string|max:255',
            // 'suburb' => 'required|string|max:255',
            // 'post_code' => 'required', 
            // 'australian_bussiness_number' => 'required',
            // 'number_of_emp' => 'required',
            // 'estimated_anunal_revenue' => 'required',
            // 'date_of_est' => 'required',
            // 'bussiness_type' => 'required',
            // 'bussiness_category' => 'required|',
            // 'website_url' => 'required',
            // 'service_hour' => 'required',
            // 'number_of_emp' => 'required',  
            

        ]);

        // dd($request->file('profile_pic'));


        if ($validator->fails()) {
            return redirect()
                ->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }


        User::find(auth()->user()->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'), 
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'alternative_phone' => $request->input('alternative_phone'),
            'company_address' => $request->input('company_address'),
            'street_address' => $request->input('street_address'),
            'suburb' => $request->input('suburb'),
            'post_code' => $request->input('post_code'),
            'company_name' => $request->input('company_name'),
            'australian_bussiness_number' => $request->input('australian_bussiness_number'),
            'number_of_emp' => $request->input('number_of_emp'),
            'estimated_anunal_revenue' => $request->input('estimated_anunal_revenue'),
            'date_of_est' => $request->input('date_of_est'),
            'bussiness_type' => $request->input('bussiness_type'),
            'bussiness_category' => $request->input('bussiness_category'),
            'website_url' => $request->input('website_url'),
            'service_hour' => $request->input('service_hour'),
            'number_of_emp' => $request->input('number_of_emp'),
        ]);

        // Update the user's profile information
        $user = auth()->user(); 

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
