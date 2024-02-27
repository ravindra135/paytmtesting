<?php

namespace App\Http\Controllers\Front;

use Illuminate\{
    Http\Request,
    Support\Facades\Session
};

use App\{
   
    Http\Controllers\Controller,
    
};
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Http\Requests\StoreImage;

class ImageController extends Controller
{

    /**
     * Constructor Method.
     *
     * @param  \App\Repositories\Front\FrontRepository $repository
     *
     */
   
  public function index()
    {
        return view('front.image.index');
    }
    

   

public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        $image_name = time().'.'.$request->image->extension();  
     
        $path = Storage::disk('s3')->put('images/gallery', $request->image);
        $path = Storage::disk('s3')->url($path);

       dd($path);
       exit();
    
        return redirect()->back()
            ->with('success', 'Image uploaded successfully.')
            ->with('image', $path); 
    }

  

}
