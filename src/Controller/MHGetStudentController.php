<?php

namespace App\Controller;

use App\Entity\MHUser;
use App\MHServices\MHGetUserServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MHGetStudentController extends AbstractController
{
    private $getUserServices;
    public function __construct(MHGetUserServices $getUserServices)
    {
        $this->getUserServices   = $getUserServices;
    }
    public function __invoke()
    {
        return $this->getUserServices->mhGetUsersByRole(MHUser::ROLE_STUDENT);
    }
}
