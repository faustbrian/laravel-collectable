<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Collectable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Collectable\Traits;

use Artisanry\Collectable\Builder;
use Artisanry\Collectable\Models\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasCollections
{
    /**
     * @return mixed
     */
    public function collections(): MorphMany
    {
        return $this->morphMany(Collection::class, 'author');
    }

    /**
     * @param $collectionName
     *
     * @return Builder
     */
    public function collection($collectionName): Builder
    {
        return new Builder($this, $collectionName);
    }
}
