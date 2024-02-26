<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Lyric;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LyricType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Lyric',
        'model' => Lyric::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The auto incremented Lyric ID.'
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
}
