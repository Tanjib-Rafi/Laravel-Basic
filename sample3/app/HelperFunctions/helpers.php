<?php
use Illuminate\Http\Request;
use App\Models\ImageModel;
use Image;
if(!function_exists('imageUpload')){

function imageUpload(Request $request)
{
    foreach($request->file('filename') as $file)
    {
    $alttext = $request->alttext;
    $originalImage= $file;
    $originalPath = public_path().'/images/';
    $name_with_ext = $originalImage->getClientOriginalName();
    $name_with_ext_arr = explode(".", $name_with_ext);
    $extension = end($name_with_ext_arr);
    $name_only = time();
    $image_name = $name_only.rand(1,1000).'.'.$extension;

    $thumbnailImage = Image::make($originalImage);
    $thumbnailPath = public_path().'/thumbnail/';
    $thumbnailImage->save($thumbnailPath.$image_name); 


    $obj= new ImageModel();
    $obj->filename = $image_name;
    $obj->alttext = $alttext;
    $obj->save();
    }
    return $image_name;

}

}