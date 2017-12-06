<?php namespace Simexis\Oembed;

use Embed\Embed as BaseEmbed;
use Embed\Request;

/**
 * Class Embed
 */
class Embed extends BaseEmbed {

    /**
     * Get info from a specify url.
     * @param $url
     * @param array $options
     * @return \Embed\Adapters\AdapterInterface
     * @throws \Embed\Exceptions\InvalidUrlException
     */
    public function get($url, array $options = [])
    {
        if(!is_array($options)) {
            $options = [];
        }
        return static::create($url, $options);
    }

    /**
     * Gets the info from a source (list of urls)
     *
     * @param  string|Request  $url  The url or a request with the source url
     * @return \Embed\Sources\SourceInterface|false
     */
    public function source($url)
    {
        return static::createSource($url);
    }

}