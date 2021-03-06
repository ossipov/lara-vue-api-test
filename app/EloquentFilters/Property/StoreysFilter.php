<?php

namespace App\EloquentFilters\Property;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class StoreysFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        $value = ($value == 'none') ? 0 : $value;
        return $builder->where('storeys', '=', $value);
    }
}
