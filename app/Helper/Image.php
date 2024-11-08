<?php

namespace App\Helper;

// use Intervention\Image\Facades\Image as Interimage;
use ImageIntervention;

class Image
{
    public function UploadImage($uploadPath, $fileRequst)
    {
        $images = request()->file($fileRequst);

        $imagepath = "";
        foreach ($images as $key => $imgvalue) {
            $extension = $imgvalue->extension();
            // $filename = time() . '.' . $extension;
            $filename = time() . '.' . 'webp';
            //Normal Save
            $path = $imgvalue->storeAs($uploadPath, $filename, 'public');
            //Normal Save

            $fullpathurl = 'storage/' . $path;
            ImageIntervention::make($fullpathurl)->encode('webp', 70)->save($fullpathurl);
            $imagepath = $fullpathurl;

        }
        return $imagepath;

    }

    public function DefaultImage()
    {
        $imageUrl = 'asset/postpic.png';
        return $imageUrl;
    }

}
