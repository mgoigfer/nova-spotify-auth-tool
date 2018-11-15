# Laravel Nova Spotifu Auth Tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mgoigfer/nova-spotify-auth-tool.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/nova-spotify-auth-tool)
[![Build Status](https://img.shields.io/travis/mgoigfer/nova-spotify-auth-tool/master.svg?style=flat-square)](https://travis-ci.org/mgoigfer/nova-spotify-auth-tool)
[![Quality Score](https://img.shields.io/scrutinizer/g/mgoigfer/nova-spotify-auth-tool.svg?style=flat-square)](https://scrutinizer-ci.com/g/mgoigfer/nova-spotify-auth-tool)
[![Total Downloads](https://img.shields.io/packagist/dt/mgoigfer/nova-spotify-auth-tool.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/nova-spotify-auth-tool)

This [Nova](https://nova.laravel.com/) tool adds a Spotify auth section to the Nova Sidebar. Under the hood it uses the [mgoigfer/laravel-spotify-wrapper](https://github.com/mgoigfer/laravel-spotify-wrapper) package.

You can authenticate yourself through Spotify API and store a refresh token to your database.

![Laravel Nova Spotify Auth Tool](./docs/screenshot.png)

## Requirements

This Nova tool requires MySQL 5.7.8 or higher.

## Installation

First, you must install [mgoigfer/laravel-spotify-wrapper](https://github.com/mgoigfer/laravel-spotify-wrapper) into your Laravel app.

Next, you can install this package via [Composer](https://getcomposer.org/):

```bash
composer require mgoigfer/nova-spotify-auth-tool
```

Register the tool in `app/Providers/NovaServiceProvider`:

```php
public function tools()
{
    return [
        new \Mgoigfer\SpotifyAuthTool\SpotifyAuthTool,
    ];
}
```

Publish and run the application migrations:

```bash
php artisan vendor:publish --provider="Mgoigfer\SpotifyAuthTool\SpotifyAuthToolServiceProvider"

php artisan migrate
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mikel Goig](https://github.com/mgoigfer)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
