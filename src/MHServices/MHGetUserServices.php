<?php

namespace App\MHServices;

use App\Repository\MHUserRepository;

class MHGetUserServices
{
    private $mhuserRepository;

    public function __construct(MHUserRepository $mhuserRepository)
    {
        $this->mhuserRepository = $mhuserRepository;
    }

    public function mhGetUsersByRole(string $role)
    {

        $users = $this->mhuserRepository->findAll();
        $cibledUsers = [];
        foreach ($users as $user) {
            if (in_array($role, $user->getRoles()))
                $cibledUsers[] = $user;
        }
        return $cibledUsers;
    }
}
