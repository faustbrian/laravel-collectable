# Laravel Collectable

I would appreciate you taking the time to look at my [Patreon](https://www.patreon.com/faustbrian) and considering to support me if I'm saving you some time with my work.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-collectable
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\Collectable\CollectableServiceProvider::class
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

use BrianFaust\Collectable\HasCollectionsTrait;
use BrianFaust\Collectable\Interfaces\HasCollections;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements HasCollections
{
    use HasCollectionsTrait;
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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
