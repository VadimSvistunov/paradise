<?php

namespace App\GraphQl\Mutations;

use App\Models\Film;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;

class DeleteFilmMutation extends Mutation
{

    protected $attributes = [
        "name" => "deleteFilm",
    ];
    public function type(): GraphQLType
    {
        return GraphQLType::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::id()),
                "rules" => ["required"],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $film = Film::findOrFail($args['id']);
        return (bool) $film->delete();
    }
}
