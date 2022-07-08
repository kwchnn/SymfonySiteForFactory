<?php


namespace App\Controller;

use App\Repository\ItemCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\BreadcrumbsService\Breadcrumbs;
use App\FormBuilder\FormBuilderType;
use App\BreadcrumbService\BreadcrumbService; //Самописный сервис получения хлебных крошек
use Knp\Component\Pager\PaginatorInterface;

class IndexController extends AbstractController //index controller
{
    private $doctrine;
    private $breadcrumbs;
    private $paginator;

    public function __construct(ItemCategoryRepository $doctrine, BreadcrumbService $breadcrumbs, PaginatorInterface $paginator)
    {
        $this->doctrine = $doctrine;
        $this->breadcrumbs = $breadcrumbs;
        $this->paginator = $paginator;
    }

    /**
     * @Route("/index", name="index")
     */
    public function indexAction(Request $request): Response
    {
        $parent_query = $this->doctrine->findAllParentCategories();
        $query = $this->doctrine->findAllCategories(); //вывод категорий

        $pagination = $this->paginator->paginate( //Использование пагинации
            $query,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('main/index.html.twig', ['category' => $pagination,
            'parent_category' => $parent_query,
            ]);
    }

    /**
     * @Route("/parent-category/{id}", name="parent-category")
     */
    public function parentCategory($id)
    {
        return $this->render('main/parent-category.html.twig');
    }

    /**
     * @Route("/post", name="post")
     */
    public function postAction()
    {
        $this->breadcrumbs->getFirstLevelBreadcrumbs('Доставка');
        return $this->render('main/post.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactAction(Request $request)
    {
        $this->breadcrumbs->getFirstLevelBreadcrumbs('Контакты');
        $form = $this->createForm(FormBuilderType::class);
        $form->handleRequest($request);
        dump($form->getData());
        return $this->render('main/contacts.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/information", name="information")
     */
    public function contactInformation()
    {
        $this->breadcrumbs->getFirstLevelBreadcrumbs('Информация');
        return $this->render('main/information.html.twig');
    }
}
?>