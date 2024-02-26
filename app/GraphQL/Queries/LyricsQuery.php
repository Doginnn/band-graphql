<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Lyric;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class LyricsQuery extends Query
{
    protected $attributes = [
        'name' => 'lyrics',
        'description' => 'Search all lyrics'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Lyric'));
    }

    public function resolve($root, $args)
    {
        return Lyric::all();
    }
}
