<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter extends AbstractFilter
{

    protected array $keys
        = [
            'title',
            'body',
            'likes',
            'published_at_from',
            'published_at_to',
            'views_from',
            'views_to',
        ];


    protected function title( Builder $builder, $value) : void
    {
        $builder->where('title', 'like', "%$value%");
    }

    protected function body(Builder $builder, $value) : void
    {
        $builder->where('body', 'like', "%$value%");
    }
    protected function likes(Builder $builder, $value) : void
    {
        $builder->where('likes', '>=', $value);
    }
    protected function publishedAtFrom(Builder $builder, $value) : void
    {
        $builder->where('published_at', '>=', $value);
    }
    protected function publishedAtTo(Builder $builder, $value) : void
    {
        $builder->where('published_at', '<=', $value);
    }
    protected function viewsFrom(Builder $builder, $value) : void
    {
        $builder->where('views', '>=', $value);
    }
    protected function viewsTo(Builder $builder, $value) : void
    {
        $builder->where('views', '<=', $value);
    }

}
