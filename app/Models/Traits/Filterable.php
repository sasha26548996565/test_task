<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Http\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, FilterContract $filter): Builder
    {
        $filter->apply($builder);

        return $builder;
    }
}
