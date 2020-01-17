<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserCreatorRepository;

final class UsersGetter
{
    /**
     * @var UserCreatorRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserCreatorRepository $repository The repository
     */
    public function __construct(UserCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function GetAllUsers(): array
    {

        return $allUsers
    }
}
