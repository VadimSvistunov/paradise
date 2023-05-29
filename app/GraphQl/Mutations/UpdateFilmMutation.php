<?php

namespace App\GraphQl\Mutations;

use App\Models\Film;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateFilmMutation extends Mutation
{
    protected $attributes = [
        "name" => "updateFilm",
    ];
    public function type(): GraphQLType
    {
        return GraphQL::type("Film");
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::id()),
            ],
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
        $film = Film::findOrFail($args['id']);
        $film->fill($args);
        $film->update();
        return $film;
    }
}
