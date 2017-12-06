<?php namespace Simexis\Oembed;

use Illuminate\Contracts\Cache\Factory AS CacheFactory;

/**
 * Class Oembed
 */
class Oembed {
	
	/**
	 * The Embed instance.
	 * 
	 * @var \Simexis\Oembed\Embed
	 */
	protected $embed;

    /**
     * The Cache Repository.
     *
     * @var CacheFactory
     */
    protected  $cache;

    /**
	 * The constructor.
	 * 
	 * @param Embed $embed
	 */
	public function __construct(Embed $embed, CacheFactory $cache)
	{
		$this->embed = $embed;
        $this->cache = $cache;
    }

    /**
     * Get info from a specify url.
     *
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
        return $this->embed->get($url, $options);
    }

    /**
     * Get info from a specify url and cache that using laravel cache manager.
     *
     * @param  string       $url
     * @param  null|array   $options
     * @return mixed
     */
    public function cache($url, array $options = null)
    {
        $lifetime = array_get($options, 'lifetime', 60);

        array_forget($options, 'lifetime');

        $self = $this;

        return $this->cache->remember($url, $lifetime, function() use ($self, $url, $options)
        {
			return $self->get($url, $options);
        });
    }
    
	/**
	 * Gets the info from a source (list of urls).
	 * 
     * @param  string|Request  $url  The url or a request with the source url
     * @return false|\Embed\Sources\SourceInterface
	 */
	public function createSource($url)
	{
		return $this->embed->source($url);
	}

}