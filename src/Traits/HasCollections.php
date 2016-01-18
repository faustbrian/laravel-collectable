<?php

namespace DraperStudio\Collectable\Traits;

use DraperStudio\Collectable\Builder;
use DraperStudio\Collectable\Models\Collection;

trait HasCollections
{
    public function collections()
    {
        return $this->morphMany(Collection::class, 'author');
    }

    public function collection($collectionName)
    {
        return new Builder($this, $collectionName);
    }
}
