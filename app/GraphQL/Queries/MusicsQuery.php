<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Music;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class MusicsQuery extends Query
{
    protected $attributes = [
        'name' => 'musics',
        'description' => 'Search all musics'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Music'));
    }

    public function resolve($root, $args)
    {
        return Music::all();
    }
}
