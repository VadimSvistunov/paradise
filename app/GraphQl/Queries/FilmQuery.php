<?php

namespace App\GraphQl\Queries;

use App\Models\Film;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class FilmQuery extends Query
{
    protected $attributes = [
        "name" => "film",
    ];

    public function type(): GraphQLType
    {
        return GraphQL::type('Film');
    }

    public function args(): array
    {
        return [
            "id" => [
                "name" => "id",
                "type" => GraphQLType::int(),
                "rules" => ["required"],
            ],
        ];
    }
    public function resolve($root, $args)
    {
        return Film::findOrFail($args["id"]);
    }
}
