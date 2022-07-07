<?php

namespace App\CRUD\Controller;

use App\Entity\ItemCategory;
use App\CRUD\Form\ItemCategoryFormType;
use App\Repository\ItemCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/item/category')]
class ItemCategoryController extends AbstractController
{
    #[Route('/', name: 'app_item_category_index', methods: ['GET'])]
    public function index(ItemCategoryRepository $itemCategoryRepository): Response
    {
        return $this->render('item_category/index.html.twig', [
            'item_categories' => $itemCategoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_item_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ItemCategoryRepository $itemCategoryRepository): Response
    {
        $itemCategory = new ItemCategory();
        $form = $this->createForm(ItemCategoryFormType::class, $itemCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemCategoryRepository->add($itemCategory, true);

            return $this->redirectToRoute('app_item_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item_category/new.html.twig', [
            'item_category' => $itemCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_item_category_show', methods: ['GET'])]
    public function show(ItemCategory $itemCategory): Response
    {
        return $this->render('item_category/show.html.twig', [
            'item_category' => $itemCategory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_item_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ItemCategory $itemCategory, ItemCategoryRepository $itemCategoryRepository): Response
    {
        $form = $this->createForm(ItemCategoryFormType::class, $itemCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $itemCategoryRepository->add($itemCategory, true);

            return $this->redirectToRoute('app_item_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('item_category/edit.html.twig', [
            'item_category' => $itemCategory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_item_category_delete', methods: ['POST'])]
    public function delete(Request $request, ItemCategory $itemCategory, ItemCategoryRepository $itemCategoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$itemCategory->getId(), $request->request->get('_token'))) {
            $itemCategoryRepository->remove($itemCategory, true);
        }

        return $this->redirectToRoute('app_item_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
