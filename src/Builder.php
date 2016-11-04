<?php

namespace BrianFaust\Collectable;

use BrianFaust\Collectable\Models\Collection;
use Illuminate\Database\Eloquent\Model;

class Builder
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @var
     */
    private $collectionName;

    /**
     * @var
     */
    private $itemType;

    /**
     * Builder constructor.
     *
     * @param Model $model
     * @param $collectionName
     */
    public function __construct(Model $model, $collectionName)
    {
        $this->model = $model;
        $this->collectionName = $collectionName;
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
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

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function has(Model $model)
    {
        return $this->buildQuery($model)->exists();
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->buildQuery()->firstOrFail();
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function get(Model $model)
    {
        return $this->buildQuery($model)->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->buildQuery()->get();
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function forget(Model $model)
    {
        return (bool) $this->buildQuery($model)->delete();
    }

    /**
     * @return bool
     */
    public function flush()
    {
        return (bool) $this->buildQuery()->delete();
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function type($value)
    {
        $this->itemType = $value;

        return $this;
    }

    /**
     * @param null $model
     *
     * @return mixed
     */
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
