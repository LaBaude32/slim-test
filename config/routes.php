<?php

use Slim\App;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

//TODO:est ce qu'on peut recuperer le $app avec le namespace ou c'est grace au require ()($app) ?
return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);
    $app->post('/users', \App\Action\UserCreateAction::class);
    $app->get('/getallusers', \App\Action\UserCreateAction::class);

};
