<?php

namespace infrastructure\Facades;

use infrastructure\FileService;
use Illuminate\Support\Facades\Facade;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FileService::class;
    }
}
