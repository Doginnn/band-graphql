<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AlbumQuery extends Query
{
    protected $attributes = [
        'name' => 'album',
        'description' => 'Search an Album by ID(one to one)'
    ];

    public function type(): Type
    {
        return GraphQL::type('Album');
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
        return Album::findOrFail($args['id']);
    }
}
