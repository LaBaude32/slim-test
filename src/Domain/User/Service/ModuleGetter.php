<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\ModuleGetterRepository;
use App\Domain\User\Repository\ModuleHasUserGetterRepository;

final class ModuleGetter
{
    /**
     * @var ModuleGetterRepository
     */
    private $repositoryModule;

    protected $repositoryModuleHasUser;

    /**
     * The constructor.
     *
     * @param ModuleGetterRepository $repository The repository
     */
    public function __construct(ModuleGetterRepository $repositoryModule, ModuleHasUserGetterRepository $repositoryModuleHasUser)
    {
        $this->repositoryModule = $repositoryModule;

        $this->repositoryModuleHasUser = $repositoryModuleHasUser;
    }

    public function GetModulesByUser(int $userId)
    {
        $allModulesNames = $this->repositoryModule->getAllModules();
        $allModulesHasUser = $this->repositoryModuleHasUser->getAllModulesHasUser($userId);

        foreach ($allModulesHasUser as $key => $value) {
            $allModulesId[] = $value->moduleIdModule;
        }
        // var_dump($allModulesNames);
        // echo 'ids:';
        // var_dump($allModulesId);

        $id = $allModulesId[0];
        if ($allModulesNames[0]->idModule === $id) {
            $allModules = [$id => $allModulesNames[0]->moduleName];
        }

        // foreach ($allModulesId as $key => $value) {
        //     $allModules[] = ;
        // }

        var_dump($allModules);
        return $allModulesNames;
    }
}
