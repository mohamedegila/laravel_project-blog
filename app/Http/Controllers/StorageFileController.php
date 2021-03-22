<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class StorageFileController extends Controller
{
    public function getPubliclyStorgeFile($filename)
    {
        dd($filename);
        $path = storage_path('app/public/uploads/'. $filename);
        dd($path);
        if (!Storage::exists($path)) {
            abort(404);
        }
       

       
        $file = Storage::get($path);
        dd($file);
        $type = Storage::mimeType($path);

        $response = Storage::make($file, 200);

        $response->header("Content-Type", $type);

        return $response;
    }
}
