<?php

namespace Laraex;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Firuzex\Laraex\Skeleton\SkeletonClass
 */
class LaraexFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraex';
    }
}
