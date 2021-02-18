<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\Task;
use App\Entity\TimeSlot;
use App\Entity\WorkDay;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Time Tracker')
            ->renderContentMaximized()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Projects', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('Tasks', 'fas fa-list', Task::class);
        yield MenuItem::linkToCrud('TimeSlot', 'fas fa-list', TimeSlot::class);
        yield MenuItem::linkToCrud('WorkDay', 'fas fa-list', WorkDay::class);
    }
}
