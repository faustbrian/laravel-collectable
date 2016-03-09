<?php

/*
 * This file is part of Laravel Collectable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Collectable\Traits;

use DraperStudio\Collectable\Builder;
use DraperStudio\Collectable\Models\Collection;

/**
 * Class HasCollections.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait HasCollections
{
    /**
     * @return mixed
     */
    public function collections()
    {
        return $this->morphMany(Collection::class, 'author');
    }

    /**
     * @param $collectionName
     *
     * @return Builder
     */
    public function collection($collectionName)
    {
        return new Builder($this, $collectionName);
    }
}
