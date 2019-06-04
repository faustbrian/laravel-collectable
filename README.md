# Laravel Collectable

[![Build Status](https://img.shields.io/travis/artisanry/Collectable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Collectable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/collectable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Collectable.svg?style=flat-square)](https://github.com/artisanry/Collectable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Collectable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Collectable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/collectable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Artisanry\Collectable\CollectableServiceProvider" && php artisan migrate
```

## Usage


##### Setup a Model

``` php
<?php

namespace App;

use Artisanry\Collectable\Traits\HasCollections;
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

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
