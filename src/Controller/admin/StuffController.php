<?php

namespace App\Controller\admin;

use App\Controller\ToolboxController;
use App\Entity\Stuff;
use App\Entity\StuffFamily;
use App\Entity\StuffParticularity;
use App\Entity\StuffType;
use App\Form\NewStuffType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Security("has_role('ROLE_ADMIN')")
 * @Route("/admin/stuff")
 */
class StuffController extends ToolboxController
{

    /**
     * @Route()
     */
    public function indexAction()
    {
        $em = $this->em();
        $repository = $em->getRepository(Stuff::class);
        $stuff = $repository->findAll();

        return $this->render('admin/stuff/index.html.twig', [
            'stuffs' => $stuff,
        ]);
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $stuff = new Stuff();
        $form = $this->createForm(NewStuffType::class, $stuff);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->em();
            $em->persist($stuff);
            $em->flush();

            $this->addFlash('success', 'L\'équipement "' . $stuff->getName() . '" a été créé/mis à jour.');

            return $this->redirectToRoute('app_admin_stuff_index');
        }

        return $this->render('admin/stuff/edit.html.twig', [
            'form' => $form->createView(),
            'stuff' => $stuff
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction(Request $request, Stuff $stuff)
    {
        $this->isTokenValid($request->query->get('token'));

        $name = $stuff->getName();
        $em = $this->em();
        $em->remove($stuff);
        $em->flush();

        $this->addFlash('success', 'L\'équipement "' . $name . '" a été supprimé.');

        return $this->redirectToRoute('app_admin_stuff_index');
    }

    /**
     * @Route("/properties", name="app_admin_stuff_index_properties")
     */
    public function indexPropertiesAction()
    {
        $em = $this->em();
        $repository = $em->getRepository(StuffType::class);
        $stuffType = $repository->findAll();
        $repository = $em->getRepository(StuffFamily::class);
        $stuffFamily = $repository->findAll();
        $repository = $em->getRepository(StuffParticularity::class);
        $stuffParticularity = $repository->findAll();

        return $this->render('admin/stuff/properties/index.html.twig', [
            'stuffTypes' => $stuffType,
            'stuffFamilies' => $stuffFamily,
            'stuffParticularities' => $stuffParticularity,
        ]);
    }

    /**
     * @Route("/update/{id}")
     */
    public function updateAction(Request $request, Stuff $stuff)
    {
        $form = $this->createForm(NewStuffType::class, $stuff);

        $form->handleRequest($request);

        return $this->render('admin/stuff/edit.html.twig', [
            'form' => $form->createView(),
            'stuff' => $stuff
        ]);
    }

}