<?php


namespace App\Traits;

use App\Models\Image;
use Intervention\Image\Facades\Image as InterventionImage;


trait HandleImageTrait
{
    protected $path = 'upload/';
    public function veryfy($request){
        return $request->has('image');
    }

    public function saveImage($request){
        if($this->veryfy($request)){
            $image = $request->file('image');
            $name = time().'.'. $image->getClientOriginalExtension();
            InterventionImage::make($image)->resize(300, 300)->save($this->path.$name);
            return $name;
        }
    }
    // public function saveImages($request)
    // {
    //     $imageUrls = [];

    //     if ($request->hasFile('images')) {
    //         $images = $request->file('images');

    //         foreach ($images as $image) {
    //             $name = time() . '_' . $image->getClientOriginalName();
    //             Image::make($image)->resize(300, 300)->save($this->path . $name);
    //             $imageUrls[] = $name;
    //         }
    //     }

    //     return $imageUrls;
    // }

    public function saveImages($request, $book)
{
    $imageUrls = [];

    if ($request->hasFile('images')) {
        $images = $request->file('images');

        foreach ($images as $image) {
            $name = time() . '_' . $image->getClientOriginalName();

            Image::make($image)->resize(300, 300)->save(public_path($this->path . $name));
            $newImage = new Image([
                'url' => $name,
            ]);

            $book->images()->save($newImage);

            $imageUrls[] = $name;
        }
    }

    return $imageUrls;
}

    public function updateImage($request, $currentImage){
        if($this->veryfy($request)){
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }

    public function deleteImage($imageName){
        if($imageName && file_exists($this->path.$imageName)){
            unlink($this->path.$imageName);


    }
}
};
