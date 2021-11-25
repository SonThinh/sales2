<?php

namespace App\Services;

use App\Models\Product;
use App\Actions\BaseAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;


class HandleImageService
{
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

    public function handleUpdateImage($modelType, $data)
    {
        $uploadedFile = $data['image']->store('stored_images');
        $oldFile = $modelType->files->file_path;

        if($uploadedFile == $oldFile) {
            return null;
        }
        $modelType->files()->delete();
        $this->handleUploadImage($modelType, $data);
    }

    public function handleDeleteImage($modelType)
    {
        $modelType->files()->delete();
    }
}
