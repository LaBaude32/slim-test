<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Data\ModuleHasUser;
use App\Domain\User\Data\UserModule;
use PDO;

class ModuleHasUserGetterRepository
{
    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllModulesHasUser(int $userId)
    {
        $query = "SELECT * FROM module_has_user WHERE user_id_user=:userid";

        $statement = $this->connection->prepare($query);
        $statement->bindValue('userid', $userId, PDO::PARAM_INT);
        $statement->execute();

        //TODO:mettre une verification sur la presence de données

        while ($row = $statement->fetch()) {
            $module = new ModuleHasUser();
            $module->moduleIdModule = (int) $row['module_id_module'];
            $module->userIdUser = (int) $row['user_id_user'];

            $modules[] = $module;
        }
        return $modules;
    }
}
