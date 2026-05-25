<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductsByCategoryController extends AbstractController
{
    #[Route('/products/by/category/{id}', name: 'app_products_by_category')]
    public function index(
        int $id,
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository
    ): Response
    {
        $category = $categoryRepository->find($id);

        $products = $productRepository->findBy([
            'category' => $category
        ]);

        return $this->render('products_by_category/index.html.twig', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}