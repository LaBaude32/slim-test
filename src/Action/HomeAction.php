<?php

namespace App\Action;

use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class HomeAction
{
    //TODO: c'est quoi en fait une classe __invoke
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        return $response->withJson(['success' => true]);
    }
}
