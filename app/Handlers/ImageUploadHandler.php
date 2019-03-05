<?php

namespace App\Handlers;

use Image;

class ImageUploadHandler
{
    protected $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        $folder_name = "uploads/images/$folder/".date('Ym/d', time());

        $upload_path = public_path(). '/'. $folder_name;

        $extension = strtolower($file->getClientOrginalExtension()) ?: 'png';

        $filename = $file_prefix.'_'.time().'_'.str_random(10).'.'.$extension;

        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        if ($max_width && $extension != 'gif') {
            $this->reduceSize($upload_path.'/'.$filename, $max_width);
        }

        return [
            'path' => config('app.url')."/$folder_name/$filename"
        ];
    }

    public function reduceSize($upload_path, $max_width)
    {
        $image = Image::make($upload_path);

        $image->resize($max_width, null, function ($constraint) {

        });
    }
}