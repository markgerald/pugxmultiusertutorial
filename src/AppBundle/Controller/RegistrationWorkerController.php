<?php
//src/AppBundle/Controller/RegistrationWorkerController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationWorkerController extends Controller
{
    public function registerAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('AppBundle\Entity\Worker');
    }

}
