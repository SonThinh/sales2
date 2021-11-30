<?php

namespace App\Models;

use App\Builders\SinglePageBuilder;
use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;

class SinglePage extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder(): string
    {
        return SinglePageBuilder::class;
    }

    protected $table = 'single_page';

    protected $fillable = ['content'];
}
