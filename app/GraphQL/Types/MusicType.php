<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Music;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MusicType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Music',
        'model' => Music::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The auto incremented Music ID.'
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
                'description' => 'The Album Title .'
            ],
        ];
    }
}
