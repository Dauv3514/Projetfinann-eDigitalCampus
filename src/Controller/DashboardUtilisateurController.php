<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardUtilisateurController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        return $this->render('dashboardutilisateur/dashboard.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/dashboard/sortiesencours", name="dashboardsortiesencours")
     */
    public function dashboardsortiesencours(): Response
    {
        return $this->render('dashboardutilisateur/dashboardsortiesencours.html.twig', [
            'controller_name' => 'DashboardUtilisateurController',
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
