<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Storage;

class FileUploadController extends Controller
{

    public function uploadForm()
    {
        return view('File.upload');
    }

    public function uploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $file = $request->file('file');
        $name = time() . '_' . $file->getClientOriginalName();
        $filePath = 'files/' . $name;
        // Storage::disk('s3')->put($filePath, file_get_contents($file));

        return back()->with('success', 'File uploaded to S3 successfully!');
    }

    public function listFiles()
    {
        $s3 = Storage::disk('s3');
        $files = $s3->files('/files');  // This will list all files in the root of the bucket
    
        $fileUrls = [];
        foreach ($files as $file) {
            $fileUrls[$file] = $s3->url($file);
        }
    
        return view('File.list', compact('fileUrls'));
    }

    public function getSignedUrl($filename)
    {
        $s3 = Storage::disk('s3');
        
        // Generate a temporary signed URL valid for 5 minutes
        $url = $s3->temporaryUrl(
            $filename, 
            now()->addMinutes(5)
        );

        return redirect($url);  // Redirect user to the signed URL
    }

}
