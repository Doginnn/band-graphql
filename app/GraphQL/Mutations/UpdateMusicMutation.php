<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Music;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateMusicMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateMusic',
    ];

    public function type(): Type
    {
        return GraphQL::type('Music');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The auto incremented music ID.'
            ],
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
                'description' => 'The Album ID reference.'
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $music = Music::findOrFail($args['id']);

        $music->updateOrFail($args);

        return $music->refresh();
    }
}
