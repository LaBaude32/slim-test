<?php

namespace App\Action;

use App\Domain\User\Service\UsersGetter;
use App\Domain\User\Service\ModuleGetter;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

class GetUserByIdAction
{
    protected $usersAllGetter;

    protected $modulesGetter;

    public function __construct(UsersGetter $usersAllGetter, ModuleGetter $modulesGetter)
    {
        $this->usersAllGetter = $usersAllGetter;
        $this->modulesGetter = $modulesGetter;
    }

    public function __invoke(ServerRequest $request, Response $response)
    {

        $data = (array) $request->getParsedBody();

        $id = $data['id'];

        $user = $this->usersAllGetter->GetUserById($id);
        $modules = $this->modulesGetter->GetModulesByUser($user->id);

        return $response->withJson($user)->withStatus(201);
    }
}
