<?php

namespace App\Transformers;

use App\Models\SinglePage;
use Flugg\Responder\Transformers\Transformer;

class SinglePageTransformer extends Transformer
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
     * @param SinglePage $singlePage
     * @return array
     */
    public function transform(SinglePage $singlePage):array
    {
        return [
            'id'      => (int) $singlePage->id,
            'content' => (string) $singlePage->content,
        ];
    }
}
