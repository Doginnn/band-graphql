<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Album;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class AlbumsQuery extends Query
{
    protected $attributes = [
        'name' => 'albums',
        'description' => 'Search all Albums'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Album'));
    }

    public function resolve($root, $args)
    {
        return Album::all();
    }
}
