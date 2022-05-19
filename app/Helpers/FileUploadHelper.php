<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadHelper
{

    private $disk = 'local';

    public  function Upload($files, $path)
    {
        // dd($files);
        $names = [];

        if (is_array($files)) {

            foreach ($files as $file) {

                if (is_object($file)) {

                    $final_file_name = $this->processFile($file, $path);
                    array_push($names, $final_file_name);
                } else {

                    $final_file_name = $this->processString($file, $path);
                    array_push($names, $final_file_name);
                }
            }
        } else {

            if (is_object($files)) {

                $names = $this->processFile($files, $path);
                // dd($names);
            } else {

                $names =  $this->processString($files, $path);
            }
        }

        return $names;
    }

    public  function processFile($file, $path)
    {
        
        $file_extension = $file->getClientOriginalExtension();
        $file_name = Str::random(5);
        $final_file_name = time() . "$file_name.$file_extension";

        $file->move(public_path($path), $final_file_name);

        return trim("$path/$final_file_name");
    }

    public function processString($file, $path)
    {
        $file_extension = "png";
        $file_name = Str::random(5);
        $final_file_name = time() . "$file_name.$file_extension";
        // dd($final_file_name);
        file_put_contents(public_path($path . "/" . $final_file_name), base64_decode($file));

        return trim("$path/$final_file_name");
    }
}
