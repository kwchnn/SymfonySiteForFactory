<?php


namespace App\Controller;

use App\Repository\ItemCategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\BreadcrumbService\BreadcrumbService; //Самописный сервис получения хлебных крошек

class CategoryController extends AbstractController
{
    private $doctrine;
    private $breadcrumbs;
    public function __construct(ItemCategoryRepository $doctrine, BreadcrumbService $breadcrumbs)
    {
        $this->doctrine = $doctrine;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * @Route("/category/{id}", name="category")
     */
    public function itemOfCategory($id): Response
    {
        $product_category = $this->doctrine->findOneBy(['id' => $id]);
        $product = $product_category->getItemCategoryPhoto();
        $item = $product_category->getItem();
        $comments = $product_category->getCategoryComment();

        $this->breadcrumbs->getCategoryBreadcrumbs($product_category->getName());

        return $this->render('main/category.html.twig', ['product' => $product,
        'product_category' => $product_category,
        'item' => $item,
        'comments' => $comments,
        ]);

    }
}