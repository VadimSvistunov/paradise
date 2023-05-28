<?php

namespace App\GraphQl\Queries;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Query;

class FilmsQuery extends Query
{
    protected $attributes = [
        "name" => "movies",
    ];
    public function type(): GraphQLType
    {
        return GraphQLType::listOf(GraphQL::type("Movie"));
    }
    public function resolve($root, $args)
    {
        return GraphQLType::all();
    }
}
