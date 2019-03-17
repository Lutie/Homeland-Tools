<?php

namespace App\Controller\admin\stuff;

use App\Controller\ToolboxController;
use App\Entity\StuffFamily;
use App\Form\StuffFamilyType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Security("has_role('ROLE_ADMIN')")
 * @Route("/admin/stuff/family")
 */
class StuffFamilyController extends ToolboxController
{

    /**
     * @Route()
     */
    public function indexAction()
    {
        return $this->render('admin/stuff/family/index.html.twig');
    }

    /**
     * @Route("/create")
     */
    public function createAction(Request $request)
    {
        $stuffFamily = new StuffFamily();
        $form = $this->createForm(StuffFamilyType::class, $stuffFamily);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stuffFamily);
            $em->flush();

            $this->addFlash('success', 'La famille "' . $stuffFamily->getName() . '" a été créée/mise à jour.');

            return $this->redirectToRoute('app_admin_stuff_index_properties');
        }

        return $this->render('admin/stuff/properties/family/edit.html.twig', [
            'form' => $form->createView(),
            'stuffFamily' => $stuffFamily
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction(Request $request, StuffFamily $stuffFamily)
    {
        $this->isTokenValid($request->query->get('token'), 'HOMELAND_TOKEN');

        $name = $stuffFamily->getName();
        $em = $this->em();
        $em->remove($stuffFamily);
        $em->flush();

        $this->addFlash('success', 'La famille d\'équipement "' . $name . '" a été supprimée.');

        return $this->redirectToRoute('app_admin_stuff_index_properties');
    }

    /**
     * @Route("/update/{id}")
     */
    public function updateAction(Request $request, StuffFamily $stuffFamily)
    {
        $form = $this->createForm(StuffFamilyType::class, $stuffFamily);

        $form->handleRequest($request);

        return $this->render('admin/stuff/properties/family/edit.html.twig', [
            'form' => $form->createView(),
            'stuffFamily' => $stuffFamily
        ]);
    }

}