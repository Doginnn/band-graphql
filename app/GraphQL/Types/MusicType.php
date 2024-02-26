<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class MusicType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Music',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [

        ];
    }
}
