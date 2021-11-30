<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace App\Filters;

use App\Traits\CommonFilter;

class SinglePageFilter extends Filter
{
    use CommonFilter;

    public function name($name)
    {
        return $this->query->whereLike('content', $name);
    }
}
