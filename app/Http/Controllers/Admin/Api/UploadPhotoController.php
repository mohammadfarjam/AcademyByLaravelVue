<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    public function upload_photos(Request $request)
    {
     $uploadedFile=$request->file('file');
     if (!empty($uploadedFile)){
         $fileName=$uploadedFile->getClientOriginalName();
         $uploadedFile->storeAs('public/photos/',$fileName);

         return response()->json($fileName,200);
     }
     }
}
