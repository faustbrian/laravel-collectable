# Laravel Collectable

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Collectable/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Collectable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-collectable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Collectable.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Collectable/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Collectable.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Collectable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-collectable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="BrianFaust\Collectable\CollectableServiceProvider" && php artisan migrate
```

## Usage


##### Setup a Model

``` php
<?php

namespace App;

use BrianFaust\Collectable\Traits\HasCollections;
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

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
