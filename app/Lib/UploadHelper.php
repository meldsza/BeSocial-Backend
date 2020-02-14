<?php

namespace App\Lib;

use App\Upload;
use Illuminate\Http\UploadedFile;
use Storage;
use Str;

class UploadHelper
{
    /**
     * Store a newly created resource in storage.
     *
     * @param   Illuminate\Http\UploadedFile  $file
     * @return App\Upload
     */
    public static function store(UploadedFile $file)
    {
        $newFileName = Str::uuid() . $file->getClientOriginalName();
        $upload = Upload::create([
            'name' => $file->getClientOriginalName(),
            'code' => $newFileName,
            'mimetype' => $file->getClientMimeType(),
        ]);
        $file->storeAs(
            'uploads',
            $newFileName
        );

        return $upload;
    }
}