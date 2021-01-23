<?php
/**
 * Created by PhpStorm.
 * User: mohammedsobhei
 * Date: 5/3/18
 * Time: 11:26 AM
 */

namespace App\Repositories;

use File;
use Illuminate\Support\Facades\Storage;
use Image;

class Uploader
{

    public function upload(array $request, $input_name)
    {
        $temp = time() . rand(5, 50);
        $ext = $request[$input_name]->getClientOriginalExtension();
        $ext = strtolower($ext);
        $new_file_name = $temp . '.' . $ext;
        $path = upload_url();
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $upload = $request[$input_name]->move($path, $new_file_name);
        if (isset($upload))
            return $new_file_name;
        return '';
    }


    public function move_image_original_folder($org_image)
    {
        $destination = upload_url();

        if (file_exists($org_image)) {
            $img_name = basename($org_image);

            return rename($org_image, $destination . '/' . $img_name);
        }
        return false;
    }

    public function deleteImage($folder, $id, $image_name)
    {
        $filename = base_path('storage/app/' . $folder . '/' . $id . '/' . $image_name);
        $filename100 = base_path('storage/app/' . $folder . '/' . $id . '/' . '/100/' . $image_name);
        $filename300 = base_path('storage/app/' . $folder . '/' . $id . '/' . '/300/' . $image_name);
//        $filename = storage_path('app/' . $folder . '/' . $image_name);
//
//        $filename100 = storage_path('app/' . $folder . '/100/' . $image_name);
//        $filename300 = storage_path('app/' . $folder . '/300/' . $image_name);//$user->getOriginal('photo')
//
        if (file_exists($filename)) {
            unlink($filename);
            unlink($filename100);
            unlink($filename300);
        }
    }

    public function storeImage($file_name)
    {
        $file = request()->file($file_name);
        $filePath = "/upload";

        return Storage::disk('local')->put($filePath, $file);
    }

    public function storeImageFile($file)
    {
        $filePath = "/upload";

        return Storage::disk('local')->put($filePath, $file);
    }

    public function storeImageThumb($folder, $id, $image)
    {
        $filename = $id . time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs($folder . '/' . $id, $filename);
        $image->storeAs($folder . '/' . $id . '/100', $filename);
        $image->storeAs($folder . '/' . $id . '/300', $filename);

        $path = base_path('storage/app/' . $folder . '/' . $id . '/' . $filename);


        $img = Image::make($path);

        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(base_path('storage/app/' . $folder . '/' . $id . '/100/' . $filename));
        $img = Image::make($path);

        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(base_path('storage/app/' . $folder . '/' . $id . '/300/' . $filename));

        return $filename;
    }

    public function storeCoverThumb($folder, $id, $image)
    {
        $filename = $id . time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs($folder . '/' . $id.'/cover', $filename);

        $path = base_path('storage/app/' . $folder . '/' . $id . '/cover/'. $filename);

        return $filename;
    }

    public function storeGallaryThumb($folder, $id, $image)
    {
        $filename = $id . time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs($folder . '/' . $id.'/gallary', $filename);

        $path = base_path('storage/app/' . $folder . '/' . $id . '/gallary/'. $filename);

        $img = Image::make($path);

        return $filename;
    }

    public function storeIconThumb($folder, $id, $image, $size = null)
    {
        $filename = $id . time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs($folder . '/' . $id, $filename);
        $image->storeAs($folder . '/' . $id . '/24', $filename);
        $image->storeAs($folder . '/' . $id . '/32', $filename);

        $path = base_path('storage/app/' . $folder . '/' . $id . '/' . $filename);


        Image::make($path)->resize(24, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(base_path('storage/app/' . $folder . '/' . $id . '/24/' . $filename));

        Image::make($path)->resize(32, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(base_path('storage/app/' . $folder . '/' . $id . '/32/' . $filename));

        Image::make($path)->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);

        return $filename;
    }

    public function upload_image(array $request ,$input_name ,$folder)
    {
        $temp = time() . rand(5, 50);
        $ext = $request[$input_name]->getClientOriginalExtension();
        $ext = strtolower($ext);
        $new_file_name = $temp . '.' . $ext;
        $path ="assets/".$folder;
        if (!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $upload = $request[$input_name]->move($path, $new_file_name);
        if (isset($upload))
            return $new_file_name;

        return null;
    }



}
