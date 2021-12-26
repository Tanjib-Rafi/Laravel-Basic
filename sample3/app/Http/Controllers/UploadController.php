<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageModel;
use Image;

class UploadController extends Controller
{
    public function upload(){
        $images = ImageModel::all();
        return view('upload', compact('images'));
}

public function uploadimage(Request $request){
        // $alttext = $request->alttext;
        // $originalImage= $request->file('filename');

        // foreach($request->file('filename') as $file)
        // {
        // $alttext = $request->alttext;
        // $originalImage= $file;
        // $originalPath = public_path().'/images/';
        // $name_with_ext = $originalImage->getClientOriginalName();
        // $name_with_ext_arr = explode(".", $name_with_ext);
        // $extension = end($name_with_ext_arr);
        // $name_only = time();
        // $image_name = $name_only.rand(1,1000).'.'.$extension;

        // $thumbnailImage = Image::make($originalImage);
        // $thumbnailPath = public_path().'/thumbnail/';
        // $thumbnailImage->save($thumbnailPath.$image_name); 


        // $obj= new ImageModel();
        // $obj->filename = $image_name;
        // $obj->alttext = $alttext;
        // $obj->save();
        // }

        $image_name = imageUpload($request);

        return back()->with('success', 'Your images has been successfully Upload');

}

}
