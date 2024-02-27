<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DestroyAlbumMutation extends Mutation
{
    protected $attributes = [
        'name' => 'destroyAlbum',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The auto incremented Album ID.'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $album = Album::findOrFail($args['id']);

        return $album->deleteOrFail($args);
    }
}
