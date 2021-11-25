<?php


namespace App\Sorts;

use App\Sorts\Sort;
use App\Traits\CommonSort;

class ProductSort extends Sort
{
    use CommonSort;

    public function name($direction)
    {
        return $this->query->orderBy('product_name', $direction);
    }
}
