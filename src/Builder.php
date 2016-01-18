<?php

namespace DraperStudio\Collectable;

use DraperStudio\Collectable\Models\Collection;
use Illuminate\Database\Eloquent\Model;

class Builder
{
    private $model;

    private $collectionName;

    private $itemType;

    public function __construct(Model $model, $collectionName)
    {
        $this->model = $model;
        $this->collectionName = $collectionName;
    }

    public function push(Model $model)
    {
        if ($this->has($model)) {
            return $this->get($model);
        }

        return $this->model->collections()->save(
            new Collection([
                'item_id' => $model->id,
                'item_type' => get_class($model),
                'collection_name' => $this->collectionName,
            ])
        );
    }

    public function has(Model $model)
    {
        return $this->buildQuery($model)->exists();
    }

    public function first()
    {
        return $this->buildQuery()->firstOrFail();
    }

    public function get(Model $model)
    {
        return $this->buildQuery($model)->firstOrFail();
    }

    public function all()
    {
        return $this->buildQuery()->get();
    }

    public function forget(Model $model)
    {
        return (bool) $this->buildQuery($model)->delete();
    }

    public function flush()
    {
        return (bool) $this->buildQuery()->delete();
    }

    public function type($value)
    {
        $this->itemType = $value;

        return $this;
    }

    private function buildQuery($model = null)
    {
        $query = $this->model->collections();

        $query = $query->whereCollectionName($this->collectionName);

        if ($model) {
            $query = $query->where('item_id', $model->id)
                           ->where('item_type', get_class($model));
        }

        if (!$model && $this->itemType) {
            $query = $query->where('item_type', '=', $this->itemType);
        }

        return $query;
    }
}
