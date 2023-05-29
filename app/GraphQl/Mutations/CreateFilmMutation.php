<?php

namespace App\GraphQl\Mutations;

use App\Models\Film;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateFilmMutation extends Mutation
{
    protected $attributes = [
        "name" => "createFilm",
    ];
    public function type(): GraphQLType
    {
        return GraphQL::type("Film");
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'director_id' => [
                'name' => 'director_id',
                'type' => GraphQLType::int(),
            ],
            'year' => [
                'name' => 'year',
                'type' => GraphQLType::nonNull(GraphQLType::int()),
            ],
            'rating' => [
                'name' => 'rating',
                'type' => GraphQLType::float(),
            ],
            'categories_ids' => [
                'name' => 'categories_ids',
                'type' => GraphQLType::nonNull(GraphQLType::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $film = new Film();
        $film->fill($args);
        $film->save();
        return $film;
    }
}
