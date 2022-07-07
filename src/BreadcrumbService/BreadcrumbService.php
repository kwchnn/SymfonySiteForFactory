<?php 

namespace App\BreadcrumbService;

use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class BreadcrumbService
{
    private $breadcrumbs;
    public function __construct(Breadcrumbs $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function getFirstLevelBreadcrumbs($section)
    {
        $this->breadcrumbs->addRouteItem('Главная', 'index');
        $this->breadcrumbs->addItem($section);
    }

    public function getCategoryBreadcrumbs($section)
    {
        $this->breadcrumbs->addRouteItem('Главная', 'index');
        $this->breadcrumbs->addItem($section);
    }
}