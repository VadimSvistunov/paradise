<?php

namespace App\GraphQl\Queries;

use App\Models\Film;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Query;

class FilmsQuery extends Query
{
    protected $attributes = [
        "name" => "films",
    ];
    public function type(): GraphQLType
    {
        return GraphQLType::listOf(GraphQL::type("Film"));
    }
    public function resolve($root, $args)
    {
        return Film::all();
    }
}
