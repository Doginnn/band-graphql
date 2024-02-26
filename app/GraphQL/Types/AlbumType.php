<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Album;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AlbumType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Album',
        'model' => Album::class
    ];

    public function fields(): array
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
            ],
        ];
    }
}
