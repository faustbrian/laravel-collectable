<?php



declare(strict_types=1);



namespace BrianFaust\Collectable;

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
