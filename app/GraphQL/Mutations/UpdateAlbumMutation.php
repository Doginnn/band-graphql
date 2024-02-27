<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateAlbumMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAlbum',
    ];

    public function type(): Type
    {
        return GraphQL::type('Album');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The auto incremented Album ID.'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Album Title .'
            ],
            'release_date' => [
                'type' => Type::string(),
                'description' => 'The Album Released Date.'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $album = Album::findOrFail($args['id']);

        $album->updateOrFail($args);

        return $album->refresh();
    }
}
