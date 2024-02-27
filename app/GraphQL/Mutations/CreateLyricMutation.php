<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Lyric;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateLyricMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createLyric'
    ];

    public function type(): Type
    {
        return GraphQL::type('Lyric');
    }

    public function args(): array
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Lyric Title.'
            ],
            'content' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Lyric content.'
            ],
            'music_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Lyric music ID reference.'
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Lyric::create($args);
    }
}
