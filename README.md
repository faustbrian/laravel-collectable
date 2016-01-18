# Laravel Collectable

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-collectable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\Collectable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Collectable\ServiceProvider" && php artisan migrate
```

-----

##### Setup a Model

```php
<?php

namespace App;

use DraperStudio\Collectable\Traits\Collectable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasCollections;
}
```

##### Add an item to the collection.
```php
$user->collection('favorites')->push($model);
```

##### Determine if an item exists in the collection for a given model.

```php
$user->collection('favorites')->has($model);
```

##### Get the first item from the collection.

```php
$user->collection('favorites')->first();
```

##### Retrieve an item from the collection by model.

```php
$user->collection('favorites')->get($model);
```

##### Get all of the items from the collection.

```php
$user->collection('favorites')->all();
```
##### Remove an item from the collection.

```php
$user->collection('favorites')->forget($model);
```
##### Remove all items from the collection.

```php
$user->collection('favorites')->flush();
```

##### Set the item-type that should be filtered by.

```php
$user->collection('favorites')->type(Post::class)->all();
```
