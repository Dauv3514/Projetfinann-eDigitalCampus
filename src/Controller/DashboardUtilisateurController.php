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
     * @Route("/dashboard/sortiesencours", name="dashboardsortiesencours", methods={"GET", "POST"})
     */
    public function dashboardsortiesencours(): Response
    {
        

        //affiche mes données sur la page par ID       
        $repo= $this->getDoctrine()->getRepository(User::class);
        // Récupère l'objet en fonction de l'@Id (généralement appelé $id)
        $users= $repo->findAll(); 

        $sortiessanspresence = true ;
        $utilisateurs = true ;

        $sorties = $this->getDoctrine()->getRepository(Sortie::class)
        ->findAllWithoutPresence($sortiessanspresence, $utilisateurs); 

        
        $sortiesavecpresence = true ;

        $sortiess = $this->getDoctrine()->getRepository(Sortie::class)
        ->findAllWithPresence($sortiesavecpresence);  
        

        return $this->render('dashboardutilisateur/dashboardsortiesencours.html.twig', [  

            'user'=> $users,
            'sorties'=> $sorties,
            'sortiessans'=> $sortiess,
            
        ]);
    }

    /**
     * @Route("/dashboard/nouvellesortie", name="nouvellesortie", methods={"GET","POST"})
     */
    public function nouvellesortie(Request $request): Response
    {
        dump($request);

        $sortie = new Sortie();
        $sortie->setUser($this->getUser());
        $form = $this->createForm(AjoutsortieType::class, $sortie);
        $form->handleRequest($request);
    

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sortie);         
            $entityManager->flush();

            return $this->redirectToRoute('dashboardsortiesencours');
        }


        return $this->render('dashboardutilisateur/nouvellesortie.html.twig', [
            'form' => $form->createView(),
            'sortie' => $sortie,
        ]);
    }

    /**
     * @Route("/dashboard/modificationsortie/{id}", name="modificationsortie", methods={"GET","POST"})
     */
    public function modificationsortie(Request $request, Sortie $sortie): Response
    {
        $form = $this->createForm(AjoutsortieType::class, $sortie);
        $form->handleRequest($request);
        dump($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboardsortiesencours');
        }

        return $this->renderForm('dashboardutilisateur/modificationsortie.html.twig', [
            'sortie' => $sortie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("supprimer/{id}", name="supprimer", methods={"POST"})
     */
    public function supprimer(Request $request, Sortie $sortie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sortie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sortie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dashboardsortiesencours');
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
