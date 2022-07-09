<?php

namespace infrastructure\Facades;

use infrastructure\Images;
use Illuminate\Support\Facades\Facade;

class ImagesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Images::class;
    }
}
