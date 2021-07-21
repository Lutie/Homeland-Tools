<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route()
     */
    public function indexAction()
    {
        $datas = [
            ['img' => '', 'text' => 'Ceci est un titre en fait', 'type' => 'title'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum Sexy', 'type' => 'bloc'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum des Familles', 'type' => 'bloc'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum des Familles', 'type' => 'bloc'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum des Familles', 'type' => 'bloc'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum des Familles', 'type' => 'bloc'],
            ['img' => '', 'text' => 'Ceci est un 2nd titre', 'type' => 'title'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum super Sexy', 'type' => 'bloc'],
            ['img' => '', 'text' => 'Ceci est un titre en fait', 'type' => 'title'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum Sexy', 'type' => 'bloc'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum des Familles', 'type' => 'bloc'],
            ['img' => '', 'text' => 'Ceci est un 2nd titre', 'type' => 'title'],
            ['img' => 'osef', 'text' => 'Lorem Ipsum super Sexy', 'type' => 'bloc'],
        ];

        return $this->render('default/index.html.twig', [
            'datas' => $datas,
        ]);
    }
}