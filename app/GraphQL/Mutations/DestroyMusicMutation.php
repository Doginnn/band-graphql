<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Music;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DestroyMusicMutation extends Mutation
{
    protected $attributes = [
        'name' => 'destroyMusic',
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
                'description' => 'The auto incremented Music ID.'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $music = Music::findOrFail($args['id']);

        return $music->deleteOrFail($args);
    }
}
