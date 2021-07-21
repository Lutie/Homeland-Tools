<?php

namespace App\Controller\admin\stuff;

use App\Controller\ToolboxController;
use App\Entity\StuffParticularity;
use App\Form\StuffParticularityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Security("has_role('ROLE_ADMIN')")
 * @Route("/admin/stuff/particularity")
 */
class StuffParticularityController extends ToolboxController
{

    /**
     * @Route()
     */
    public function indexAction()
    {
        return $this->render('admin/stuff/particularity/index.html.twig');
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $stuffParticularity = new StuffParticularity();
        $form = $this->createForm(StuffParticularityType::class, $stuffParticularity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stuffParticularity);
            $em->flush();

            $this->addFlash('success', 'La particularité "' . $stuffParticularity->getName() . '" a été créée.');

            return $this->redirectToRoute('app_admin_stuff_index_properties');
        }

        return $this->render('admin/stuff/properties/particularity/edit.html.twig', [
            'form' => $form->createView(),
            'stuffParticularity' => $stuffParticularity
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction(Request $request, StuffParticularity $stuffParticularity)
    {
        $this->isTokenValid($request->query->get('token'));

        $name = $stuffParticularity->getName();
        $em = $this->em();
        $em->remove($stuffParticularity);
        $em->flush();

        $this->addFlash('success', 'La particularité d\'équipement "' . $name . '" a été supprimée.');

        return $this->redirectToRoute('app_admin_stuff_index_properties');
    }

    /**
     * @Route("/update/{id}")
     */
    public function updateAction(Request $request, StuffParticularity $stuffParticularity)
    {
        $form = $this->createForm(StuffParticularityType::class, $stuffParticularity);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stuffParticularity);
            $em->flush();

            $this->addFlash('success', 'La particularité "' . $stuffParticularity->getName() . '" a été mise à jour.');

            return $this->redirectToRoute('app_admin_stuff_index_properties');
        }

        return $this->render('admin/stuff/properties/particularity/edit.html.twig', [
            'form' => $form->createView(),
            'stuffParticularity' => $stuffParticularity
        ]);
    }

}