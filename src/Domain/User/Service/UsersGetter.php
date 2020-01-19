<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UsersGetterRepository;

final class UsersGetter
{
    /**
     * @var UsersGetterRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UsersGetterRepository $repository The repository
     */
    public function __construct(UsersGetterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function GetAllUsers()
    {
        $allUsers = $this->repository->getAllUsers();
        return $allUsers;
    }
}
