<?php
namespace App\Controller;

use App\Entity\Product;
use App\Service\SessionCart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductDetailsController extends AbstractController
{
    #[Route('/product-details/{id}', name: 'app_product_details')]
    public function index(Product $product, SessionCart $cart): Response
    {
        $cart->addProduct($product);
        return $this->render('product_details/index.html.twig', [
            'product' => $product,
        ]);
    }
}
