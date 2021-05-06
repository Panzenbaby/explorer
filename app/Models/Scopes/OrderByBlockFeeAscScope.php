<?php

declare(strict_types=1);

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

final class OrderByBlockFeeAscScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderBy('total_fee', 'asc');
    }
}