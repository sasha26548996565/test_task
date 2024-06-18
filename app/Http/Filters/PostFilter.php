<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    private const CATEGORY_ID = 'category_id';
    private const USER_ID = 'user_id';

    public function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::USER_ID => [$this, 'userId']
        ];
    }

    public function categoryId(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }

    public function userId(Builder $builder, $value): void
    {
        $builder->where('user_id', $value);
    }
}
