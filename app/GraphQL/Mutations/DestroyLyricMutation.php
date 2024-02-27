<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Lyric;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DestroyLyricMutation extends Mutation
{
    protected $attributes = [
        'name' => 'destroyLyric',
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
                'description' => 'The auto incremented Lyric ID.'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $lyric = Lyric::findOrFail($args['id']);

        return $lyric->deleteOrFail($args);
    }
}
