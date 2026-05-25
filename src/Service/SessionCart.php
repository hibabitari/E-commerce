<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart
{
    public function __construct(private RequestStack $requestStack) {}

    public function addProduct($product): void
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);
        $id = $product->getId();
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'title' => $product->getTitle(),
                'price' => $product->getPrice(),
                'quantity' => 1,
            ];
        }
        $session->set('cart', $cart);
    }

    public function getCart(): array
    {
        return $this->requestStack->getSession()->get('cart', []);
    }
}
