<?php

namespace BrianFaust\Collectable;

use BrianFaust\Collectable\Builder;
use BrianFaust\Collectable\Collection;

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
