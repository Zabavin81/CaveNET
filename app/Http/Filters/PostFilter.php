<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter
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

    public function apply(Builder $builder, array $data) :Builder
    {
        foreach ($this->keys as $key) {
            if (isset($data[$key])) {
                $methodName = Str::camel($key);
                $this->$methodName($builder, $data[$key]);
            }
        }
        return $builder;
    }

    protected function title( Builder $builder, $value) : void
    {
        $builder->where('title', 'like', $value);
    }

    protected function body(Builder $builder, $value) : void
    {
        $builder->where('body', 'like', $value);
    }
    protected function likes(Builder $builder, $value) : void
    {
        $builder->where('likes', '>=', $value);
    }
    protected function publishedAtFrom(Builder $builder, $value) : void
    {
        $builder->where('published_at_from', '>=', $value);
    }
    protected function publishedAtTo(Builder $builder, $value) : void
    {
        $builder->where('published_at_to', '<=', $value);
    }
    protected function viewFrom(Builder $builder, $value) : void
    {
        $builder->where('views_from', '>=', $value);
    }
    protected function viewsTo(Builder $builder, $value) : void
    {
        $builder->where('views_to', '<=', $value);
    }

}
