<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/contactos-v1', methods: ['GET', 'POST'])]
    public function contactV1(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('email', TextType::class)
            ->add('message', TextareaType::class, [
                'label' => 'Comentario, sugerencia o mensaje'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enviar'
            ])
            // ->setMethod('GET')
            // ->setAction('otra-url')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // getData() contiene todos los valores que se han enviado
            dd($form->getData(), $request);
        }


        return $this->render('page/contact-v1.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
