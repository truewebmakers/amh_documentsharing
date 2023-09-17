<?php

namespace App\Http\Controllers;

use App\Models\{DocumentUpload, User};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DocumentUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // $userModel = new User(); 
        $relatedUsers = $user->getRelatedUsers();
        //  echo "<pre>"; print_r($relatedUsers); die; 
        return view('document.explorer', compact('relatedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loggedInUser = Auth::user();

        if ($loggedInUser->hasRole('admin')) {
            // Fetch all users except the admin
            $users = User::where('id', '!=', $loggedInUser->id)->get();
        } else {
            // If a non-admin user is logged in, they can only see users with the 'admin' role
            $adminRole = Role::where('name', 'admin')->first();
            $users = $adminRole->users;
        }

        return view('document.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAEd(Request $request)
    {

        $filePaths = json_decode($request->input('file_paths'), true);
        //  echo "<pre>"; print_r($filePaths); die;
        $request->validate([
            'user_ids' => 'required', // user_ids should be an array
            // 'user_ids.*' => 'exists:users,id', // Check if each user_id exists in the users table
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'files' => 'required|array|min:1', // At least one file is required
            // 'files.*' => 'file|mimes:pdf,doc,docx', // Valid file types and maximum size (2MB)
            'files.*' => 'file|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain,image/jpeg,image/png,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',

        ]);

        $userIdsArray = json_decode($request->input('user_ids'), true);
        $usersArry = [];
        foreach ($userIdsArray as $user) {
            $usersArry[] = $user['id'];
        }

        // Upload and store each file in the documents directory
        $uploadedFiles = [];
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('documents', $fileName, 's3'); // Store on S3, adjust the disk as needed
            $uploadedFiles[] = $fileName;
        }

        // Create a new document upload record for each uploaded file and user
        foreach ($uploadedFiles as $fileName) {
            foreach ($usersArry as $userId) {
                DocumentUpload::create([
                    'user_id' => $userId,
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'file_path' => $fileName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Documents uploaded successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_paths' => 'required',
        ]);

        $userIdsArray = json_decode($request->input('user_ids'), true);
        $filePaths = $request->input('file_paths');

        // echo "<pre>"; print_r($userIdsArray); die; 

        foreach ($filePaths as $filePath) {


            foreach ($userIdsArray as $user) {
                $user_id = $user['id'];
                DocumentUpload::create([
                    'sent_from' => Auth::user()->id,
                    'sent_to' => $user_id,
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'file_path' => $filePath,
                ]);
            }

            // Create a new document upload record

        }
        // }




        return redirect()->back()->with('success', 'Documents uploaded successfully!');
    }

    public function getDocuments(Request $request)
    {

        if ($request->input('type') == 'sent') {
            $docs = DocumentUpload::where(['sent_from' => Auth::user()->id, 'sent_to' => $request->input('id')])->get()->toArray();
            return response()->json(['status' => true, 'data' => $docs, 'path' => env('AWS_PUBLIC_PATH') . 'documents/'], 200);
        } else {
            $docs = DocumentUpload::where(['sent_to' => Auth::user()->id, 'sent_from' => $request->input('id')])->get()->toArray();
            return response()->json(['status' => true, 'data' => $docs, 'path' => env('AWS_PUBLIC_PATH') . 'documents/'], 200);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(DocumentUpload $DocumentUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentUpload $DocumentUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentUpload $DocumentUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentUpload $DocumentUpload)
    {
        //
    }


    public function upload(Request $request)
    {


        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif,xls,xlsx', // Adjust the allowed file types and size
            ]);
            $image = $request->file('file');
            $imageName = Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();
            Storage::disk('s3')->put('documents/' . $imageName, file_get_contents($image));
            return response()->json([
                'temp_path' => $imageName,
                'message' => 'File uploaded successfully.',
                'img_id' => 'img_id' . time(),
            ]);
        }
        if ($request->input('type') == 'remove') {
            $image = $request->input('file_name');
            $path = 'documents/' . $image;
            if (Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
            }
            return response()->json([
                'temp_path' => $image,
                'message' => 'File deleted successfully.',
                'img_id' => 'img_id' . time(),
            ]);
        }
    }
}
