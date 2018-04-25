<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 24.04.2018
 * Time: 14:52
 */

namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function uploadImage($imageToUploading, $path)
    {
        //upload file
        //todo $request->file('cover_image') == $imageToUploading
        //Get filename with the extention
        $filenameWithExt = $imageToUploading->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just extention
        $extention = $imageToUploading->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extention;
        //Store image in dir
        $path = $imageToUploading->storeAs('public/img/' . $path, $fileNameToStore);

        return $fileNameToStore;
    }

    public function deleteImage($imageToDeleting, $path)
    {
        //todo $posts->cover_image == $imageToDeleting
        if ($imageToDeleting != 'noimage.jpg') {
            Storage::delete('public/img/' . $path . '/' . $imageToDeleting);
            return true;
        } else {
            return false;
        }
    }
}