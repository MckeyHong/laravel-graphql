<?php

namespace App\GraphQL\Mutation;

use App\User;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'name'     => ['name' => 'name', 'type' => Type::string()],
            'email'    => ['name' => 'email', 'type' => Type::string()],
            'password' => ['name' => 'password', 'type' => Type::string()],
        ];
    }

    public function rules()
    {
        return [
            'name'     => ['required', 'max:20'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:20'],
        ];
    }

    public function resolve($root, $args)
    {
        return User::create([
            'name'     => $args['name'],
            'email'    => $args['email'],
            'password' => bcrypt($args['password']),
        ]);
    }
}
