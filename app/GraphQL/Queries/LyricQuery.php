<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Lyric;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class LyricQuery extends Query
{
    protected $attributes = [
        'name' => 'lyric',
        'description' => 'Search an Lyric by ID(one to one)'
    ];

    public function type(): Type
    {
        return GraphQL::type('Lyric');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id()
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Lyric::findOrFail($args['id']);
    }
}
