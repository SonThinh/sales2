<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;


class HandleImageService
{
    /**
     * handleUploadImage(): store image and attach to model
     * @param $modelType
     * @param $data
     * @return Model
     */
    public function handleUploadImage($modelType, $data): Model
    {
        $uploadedFile = $data['image']->store('stored_images');

        return $modelType->files()->create([
            'file_name' => basename($uploadedFile),
            'file_path' => $uploadedFile,
            'disk' => 'local',
            'file_size'=> Storage::size($uploadedFile),
        ]);
    }

    /**
     * handleUpdateImage(): handle uploaded image and change it
     * @param $modelType
     * @param $data
     * @return Model|mixed
     */
    public function handleUpdateImage($modelType, $data)
    {
        if(!array_key_exists('image',$data)) {
            return $modelType->files->first();
        }
        $this->handleDeleteImage($modelType);

        return $this->handleUploadImage($modelType, $data);
    }

    /**
     * handleDeleteImage(): delete a file that relation with a model
     * @param $modelType
     */
    public function handleDeleteImage($modelType)
    {
        $modelType->files()->delete();
    }
}
