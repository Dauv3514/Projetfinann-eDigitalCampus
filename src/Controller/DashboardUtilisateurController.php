<?php

namespace App\Controller;

use App\Entity\Sortie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\AjoutsortieType;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Symfony\Component\Routing\Annotation\Route;

class DashboardUtilisateurController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard", methods={"GET","POST"})
     */
    public function dashboard(): Response
    {
        return $this->render('dashboardutilisateur/dashboard.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/dashboard/modificationsortie/{id}", name="modificationsortie", methods={"GET","POST"})
     */
    public function edit(Request $request, Sortie $sortie): Response
    {
        $form = $this->createForm(AjoutsortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboardsortiesencours', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboardutilisateur/modificationsortie.html.twig', [
            'sortie' => $sortie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/dashboard/sortiesencours", name="dashboardsortiesencours", methods={"GET", "POST"})
     */
    public function dashboardsortiesencours(SortieRepository $SortieRepository): Response
    {
        
        //affiche mes données sur la page par ID       
        $repo=$this->getDoctrine()->getRepository(Sortie::class);
        // Récupère l'objet en fonction de l'@Id (généralement appelé $id)
        $sorties=$repo->findAll();

        //affiche mes données sur la page par ID       
        $repo=$this->getDoctrine()->getRepository(User::class);
        // Récupère l'objet en fonction de l'@Id (généralement appelé $id)
        $users=$repo->findAll();

        // // from inside a controller
        //     $presence = true ;

        //     $sorties = $this -> getDoctrine ()
        //     -> getRepository ( Sortie :: class )
        //     -> findAllGreaterThanSortie ( $presence ); 

        // // ... 


        return $this->render('dashboardutilisateur/dashboardsortiesencours.html.twig', [      
            'sorties'=>$sorties,
            'users'=>$users,
            
        ]);
    }

    /**
     * @Route("/dashboard/nouvellesortie", name="nouvellesortie", methods={"GET","POST"})
     */
    public function nouvellesortie(Request $request): Response
    {
        dump($request);

        $sortie = new Sortie();
        $form = $this->createForm(AjoutsortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sortie);
            $entityManager->flush();
 
            return $this->redirectToRoute('nouvellesortie');
        }

        var_dump($sortie);

        return $this->render('dashboardutilisateur/nouvellesortie.html.twig', [
            'form' => $form->createView(),
            'sortie' => $sortie,
        ]);
    }


    /**
     * @Route("/dashboard/messages", name="dashboardmessages")
     */
    public function dashboardmessages(): Response
    {
        return $this->render('dashboardutilisateur/dashboardmessages.html.twig', [
            'controller_name' => 'DashboardUtilisateurController',
        ]);
    }

    /**
     * @Route("/dashboard/profil", name="dashboardprofil")
     */
    public function dashboardprofil(): Response
    {
        return $this->render('dashboardutilisateur/dashboardprofil.html.twig', [
            'controller_name' => 'DashboardUtilisateurController',
        ]);
    }

    /**
     * @Route("/dashboard/sortiesterminees", name="dashboardsortiesterminees")
     */
    public function dashboardsortiesterminees(): Response
    {
        return $this->render('dashboardutilisateur/dashboardsortiesterminees.html.twig', [
            'controller_name' => 'DashboardUtilisateurController',
        ]);
    }



}
