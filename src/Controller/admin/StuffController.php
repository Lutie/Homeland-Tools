<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Security("has_role('ROLE_ADMIN')")
 * @Route("/admin/stuff")
 */
class StuffController extends AbstractController
{

    /**
     * @Route()
     */
    public function indexAction()
    {
        return $this->render('admin/stuff/index.html.twig');
    }

}