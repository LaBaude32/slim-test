<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserData;
use PDO;

class UsersGetterRepository
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $user = new UserData();
            $user->id = (int) $row['id'];
            $user->username = (string) $row['username'];
            $user->firstName = (string) $row['first_name'];
            $user->lastName = (string) $row['last_name'];
            $user->email = (string) $row['email'];

            $users[] = $user;
        }
        return $users;
    }
}
