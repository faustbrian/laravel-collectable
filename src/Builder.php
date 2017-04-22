<?php



declare(strict_types=1);



namespace BrianFaust\Collectable;

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
    public function __construct(Model $model, string $collectionName)
    {
        $this->model = $model;
        $this->collectionName = $collectionName;
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function push(Model $model): bool
    {
        if ($this->has($model)) {
            return $this->get($model);
        }

        return (bool) $this->model->collections()->save(
            new Collection([
                'item_id'         => $model->id,
                'item_type'       => get_class($model),
                'collection_name' => $this->collectionName,
            ])
        );
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function has(Model $model): bool
    {
        return $this->buildQuery($model)->exists();
    }

    /**
     * @return mixed
     */
    public function first(): Model
    {
        return $this->buildQuery()->firstOrFail();
    }

    /**
     * @param Model $model
     *
     * @return mixed
     */
    public function get(Model $model): Model
    {
        return $this->buildQuery($model)->firstOrFail();
    }

    /**
     * @return mixed
     */
    public function all(): Collection
    {
        return $this->buildQuery()->get();
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function forget(Model $model): bool
    {
        return (bool) $this->buildQuery($model)->delete();
    }

    /**
     * @return bool
     */
    public function flush(): bool
    {
        return (bool) $this->buildQuery()->delete();
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function type($value): self
    {
        $this->itemType = $value;

        return $this;
    }

    /**
     * @param null $model
     *
     * @return mixed
     */
    private function buildQuery(Model $model = null)
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
