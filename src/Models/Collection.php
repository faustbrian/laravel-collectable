<?php

namespace DraperStudio\Collectable\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author()
    {
        return $this->morphTo();
    }

    public function item()
    {
        return $this->morphTo();
    }
}
