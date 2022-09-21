<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    // Store Image to local server
    function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('image')){
            $image= $request->file('image');
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
        

            //now save the data in database
            $image= new Image;
            $image->image_name= $imageName;
            $image->image_path= 'images/' . $imageName;
            $saved= $image->save();

            if($saved){
                return back()->with('success', 'Image Uploaded Successfully.');
            }else{
                return back()->with('fail', 'Something went wrong.');
            }
        }
    }

    function showImages(){
        $imageData= Image::paginate(5);
        return $imageData;
    }

    function editImage($id){
        $image= Image::find($id);
        return view('admin.editImage', compact('image'));
    }

    function updateImage(Request $request, $id){
        $currentImage= Image::find($id);

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->hasFile('image')){
            //check weather the current image is uploaded on server
            $currentImagePath= 'images/' . $currentImage->image_name;
            if(File::exists($currentImagePath)){
                File::delete($currentImagePath);
            }

            $image= $request->file('image');
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
        

            //now save the data in database
            $currentImage->image_name= $imageName;
            $currentImage->image_path= 'images/' . $imageName;
            $saved= $currentImage->save();

            if($saved){
                return back()->with('success', 'Image Updated Successfully.');
            }else{
                return back()->with('fail', 'Something went wrong.');
            }
        }
    }

    function deleteImage($id){
        $image= Image::find($id);
        $imagePath= 'images/' . $image->image_name;

        if(File::exists($imagePath)){
            File::delete($imagePath);
        }

        $image->delete();
        return redirect()->back()->with('success', 'Image Deleted Successfully.');
    }

}
