<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);
    $app->post('/addusers', \App\Action\UserCreateAction::class);
    $app->get('/getallusers', \App\Action\GetAllUsersAction::class);
    $app->get('/getuserbyid', \App\Action\GetUserByIdAction::class);
};
