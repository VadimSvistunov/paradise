<?php

namespace App\GraphQl\Types;

use GraphQL\Type\Definition\Type;
use App\Models\Film;
use Rebing\GraphQL\Support\Type as GraphQlType;

class FilmType extends GraphQlType
{

    protected $attributes = [
        'name' => 'Film',
        'description' => 'Collection of films',
        'model' => Film::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'director_id' => [
                'type' => Type::int(),
            ],
            'year' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'rating' => [
                'type' => Type::float(),
            ],
            'categories_ids' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }
}
