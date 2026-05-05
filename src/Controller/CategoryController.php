<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function browse(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/browse.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/category/{id}/products', name: 'app_products_by_category')]
    public function productsByCategory(Category $category): Response
    {
        $products = $category->getProducts();

        return $this->render('product/by_category.html.twig', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
