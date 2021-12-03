<?php

namespace App\Transformers;

use App\Models\File;
use Flugg\Responder\Transformers\Transformer;

class FileTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     * @param File $file
     * @return array
     */

    public function transform(File $file)
    {
        return [
            'id'        => (int) $file->id,
            'file_path' => (string) $file->file_path,
        ];
    }
}
