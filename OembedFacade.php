<?php namespace Simexis\Oembed;

use Illuminate\Support\Facades\Facade;

/**
 * Class Oembed
 */
class OembedFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'oembed';
    }

}