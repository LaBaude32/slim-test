<?php

namespace App\Domain\User\Repository;

use PDO;
use UnexpectedValueException;
use App\Domain\User\Data\UserData;

class UsersGetterRepository
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";

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

    public function getUserById(int $userId)
    {
        $query = "SELECT * FROM user WHERE id_user=:id";

        $statement = $this->connection->prepare($query);
        $statement->bindValue('id', $userId, PDO::PARAM_INT);

        $statement->execute();

        $row = $statement->fetch();

        if (empty($row['id_user'])) {
            throw new UnexpectedValueException('id required');
        }

        $user = new UserData();
        $user->id = (int) $row['id_user'];
        $user->username = (string) $row['username'];
        $user->firstName = (string) $row['first_name'];
        $user->lastName = (string) $row['last_name'];
        $user->email = (string) $row['email'];

        return $user;
    }
}
