<?php

namespace App\Http\Controllers;

use App\Models\images;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }
    public function storeUpload(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000'
        ]);
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $URL = time() . '-' . $image->getClientOriginalName();
                images::create([
                    'URL' => $URL,
                ]);
            }
            return back()->with('success', 'File successfully');
        }
        return back()->with('success', 'WRONG!');
    }
}
