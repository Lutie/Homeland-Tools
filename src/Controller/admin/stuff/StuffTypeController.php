<?php

namespace App\Controller\admin\stuff;

use App\Controller\ToolboxController;
use App\Entity\StuffType;
use App\Form\StuffType as StuffTypeForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Security("has_role('ROLE_ADMIN')")
 * @Route("/admin/stuff/type")
 */
class StuffTypeController extends ToolboxController
{

    /**
     * @Route()
     */
    public function indexAction()
    {
        return $this->render('admin/stuff/type/index.html.twig');
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $stuffType = new StuffType();
        $form = $this->createForm(StuffTypeForm::class, $stuffType);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stuffType);
            $em->flush();

            $this->addFlash('success', 'Le type "' . $stuffType->getName() . '" a été créé/mis à jour.');

            return $this->redirectToRoute('app_admin_stuff_index_properties');
        }

        return $this->render('admin/stuff/properties/type/edit.html.twig', [
            'form' => $form->createView(),
            'stuffType' => $stuffType
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction(Request $request, StuffType $stuffType)
    {
        $this->isTokenValid($request->query->get('token'));

        $name = $stuffType->getName();
        $em = $this->em();
        $em->remove($stuffType);
        $em->flush();

        $this->addFlash('success', 'Le type d\'équipement "' . $name . '" a été supprimé.');

        return $this->redirectToRoute('app_admin_stuff_index_properties');
    }

    /**
     * @Route("/update/{id}")
     */
    public function updateAction(Request $request, StuffType $stuffType)
    {
        $form = $this->createForm(StuffTypeForm::class, $stuffType);

        $form->handleRequest($request);

        return $this->render('admin/stuff/properties/type/edit.html.twig', [
            'form' => $form->createView(),
            'stuffType' => $stuffType
        ]);
    }

}