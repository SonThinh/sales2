<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace App\Filters;

use App\Traits\CommonFilter;

class ProductFilter extends Filter
{
    use CommonFilter;

    public function name($name)
    {
        return $this->query->whereLike('product_name', $name);
    }
}
