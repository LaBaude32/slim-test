<?php

namespace App\Action;

use App\Domain\User\Service\UsersGetter;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class GetAllUsersAction
{
    protected $usersAllGetter;

    public function __construct(UsersGetter $usersAllGetter)
    {
        $this->usersAllGetter = $usersAllGetter;
    }

    public function __invoke(ServerRequest $request, Response $response)
    {
        $users = $this->usersAllGetter->GetAllUsers();

        return $response->withJson($users)->withStatus(201);
    }
}
