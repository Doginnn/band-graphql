<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class LyricType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Lyric',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [

        ];
    }
}
