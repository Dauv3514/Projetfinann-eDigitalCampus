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

        /* Methodes permettant d'afficher les sorties en fonctions de certains critères
        Dans l'odre -> Mes propositions de sorties en cours (accompagnant trouve)
                    -> Mes propositions de sorties en cours (accompagnant non trouve)
                    -> Mes sorties d'accompagnateur que j'ai acceptées en cours
        */

        $nonvalidee = true ;
        $ids = $this->getUser()->getId();

        $sorties = $this->getDoctrine()->getRepository(Sortie::class)
        ->findAllWithoutPresence($ids, $nonvalidee); 


        $sortiesavecpresence = true ;
        $id = $this->getUser()->getId();

        $sortiess = $this->getDoctrine()->getRepository(Sortie::class)
        ->findAllWithPresence($sortiesavecpresence, $id);  


        $repo= $this->getDoctrine()->getRepository(Sortie::class);
        // Récupère l'objet en fonction de l'@Id (généralement appelé $id)
        $sortietest= $repo->findAll();
        

        return $this->render('dashboardutilisateur/dashboardsortiesencours.html.twig', [  

            'users'=> $users,
            'sorties'=> $sorties,
            'sortiessans'=> $sortiess,
            'sortietest'=> $sortietest,
            
        ]);
    }

    /**
     * @Route("/dashboard/nouvellesortie", name="nouvellesortie", methods={"GET","POST"})
     */
    public function nouvellesortie(Request $request): Response
    {

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
     * @Route("dashboard/modificationsortie/{id}", name="modificationsortie", methods={"GET","POST"})
     */
    public function modificationsortie(Request $request, Sortie $sortie): Response
    {

        $sortie->setUser($this->getUser());
        $form = $this->createForm(AjoutsortieType::class, $sortie);
        $form->handleRequest($request);
        // var_dump($request);

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
     * @Route("dashboard/detailsortie/{id}", name="apercusortie", methods={"GET"})
     */
    public function apercusortie(Sortie $sorties): Response
    {
        return $this->render('dashboardutilisateur/apercusortie.html.twig', [
            'sortie' => $sorties,
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
        dump($request);

        return $this->redirectToRoute('dashboardsortiesencours');
    }

    /**
     * @Route("/dashboard/sortiesterminees", name="dashboardsortiesterminees")
     */
    public function dashboardsortiesterminees(): Response
    {

        /* Methode permettant d'afficher les sorties terminees
        */

        $sortiesterminees = true ;

        $sorties = $this->getDoctrine()->getRepository(Sortie::class)
        ->findAllTerminee($sortiesterminees);  

        return $this->render('dashboardutilisateur/dashboardsortiesterminees.html.twig', [
            'sorties' => $sorties,
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


}
