Oembed
======

Laravel 5 - Retrieve page info using oembed, opengraph, etc.

### Server Requirements

    Require PHP 5.5+ or higher.

### Installation

Open your composer.json file, and add the new required package.

    "simexis/oembed": "1.0.*"

Next, open a terminal and run.

    composer update

After the composer updated. Add new service provider in app/config/app.php.

```php
    Simexis\Oembed\OembedServiceProvider::class
```

Next, Add new alias.

```php
    'Oembed'    => Simexis\Oembed\OembedFacade::class
```

Done.

### Usage

Basic Usage

```php
$info = Oembed::get('https://www.youtube.com/watch?v=PP1xn5wHtxE');

//Get content info

$info->title; //The page title
$info->description; //The page description
$info->url; //The canonical url
$info->type; //The page type (link, video, image, rich)

$info->images; //List of all images found in the page
$info->image; //The image choosen as main image
$info->imageWidth; //The with of the main image
$info->imageHeight; //The height  of the main image

$info->code; //The code to embed the image, video, etc
$info->width; //The with of the embed code
$info->height; //The height of the embed code
$info->aspectRatio; //The aspect ratio (width/height)

$info->authorName; //The (video/article/image/whatever) author 
$info->authorUrl; //The author url

$info->providerName; //The provider name of the page (youtube, twitter, instagram, etc)
$info->providerUrl; //The provider url
$info->providerIcons; //All provider icons found in the page
$info->providerIcon; //The icon choosen as main icon
```

Caching the results.

```php
$info = Oembed::cache($url, $options);
```

### License

This package is open-sourced software licensed under [The BSD 3-Clause License](http://opensource.org/licenses/BSD-3-Clause)
