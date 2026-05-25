<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\CartHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductDetailsController extends AbstractController
{
    #[Route('/product-details/{id}', name: 'app_product_details')]
    public function index(
        Product $product,
        CartHandler $cartHandler
    ): Response {

        $cartHandler->addProduct($product);

        return $this->render('product_details/index.html.twig', [
            'product' => $product,
        ]);
    }
}