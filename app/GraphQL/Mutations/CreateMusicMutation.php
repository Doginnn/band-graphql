<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Music;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateMusicMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createMusic'
    ];

    public function type(): Type
    {
        return GraphQL::type('Music');
    }

    public function args(): array
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Music Title.'
            ],
            'duration' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Music duration.'
            ],
            'album_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Music ID reference.'
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Music::create($args);
    }
}
