# Laravel Collectable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-collectable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Collectable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Collectable\ServiceProvider" && php artisan migrate
```

## Usage


##### Setup a Model

``` php
<?php

/*
 * This file is part of Laravel Collectable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use DraperStudio\Collectable\Traits\Collectable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasCollections;
}
```

##### Add an item to the collection.
``` php
$user->collection('favorites')->push($model);
```

##### Determine if an item exists in the collection for a given model.

``` php
$user->collection('favorites')->has($model);
```

##### Get the first item from the collection.

``` php
$user->collection('favorites')->first();
```

##### Retrieve an item from the collection by model.

``` php
$user->collection('favorites')->get($model);
```

##### Get all of the items from the collection.

``` php
$user->collection('favorites')->all();
```
##### Remove an item from the collection.

``` php
$user->collection('favorites')->forget($model);
```
##### Remove all items from the collection.

``` php
$user->collection('favorites')->flush();
```

##### Set the item-type that should be filtered by.

``` php
$user->collection('favorites')->type(Post::class)->all();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-collectable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Collectable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-collectable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-collectable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-collectable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-collectable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Collectable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-collectable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-collectable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-collectable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
