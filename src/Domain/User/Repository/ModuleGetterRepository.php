<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\UserModule;
use PDO;

class ModuleGetterRepository
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllModules()
    {
        $sql = "SELECT * FROM module";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        while ($row = $statement->fetch()) {
            $user = new UserModule();
            $user->idModule = (int) $row['id_module'];
            $user->moduleName = (string) $row['name'];

            $users[] = $user;
        }
        return $users;
    }
}
