<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUpload
{
    public function uploadFile(Request $request, $input_name, $path, $disk): false|string
    {
        if($request->hasFile($input_name)) {
            $uploaded_file = $request->{$input_name};

            $extension = $uploaded_file->getClientOriginalExtension();
            $file_name = $input_name.'_'.uniqid().'.'.$extension;

            $uploaded_file->storeAs($path, $file_name, $disk);

            return $path.'/'.$file_name;
        }

        return false;
    }
}
