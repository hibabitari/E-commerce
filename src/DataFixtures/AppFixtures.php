<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // CATEGORY 1
        $electronics = new Category();
        $electronics->setName('Electronics');
        $electronics->setDescription('Electronic products');

        $manager->persist($electronics);

        // CATEGORY 2
        $fashion = new Category();
        $fashion->setName('Fashion');
        $fashion->setDescription('Fashion products');

        $manager->persist($fashion);

        // PRODUCT 1
        $product1 = new Product();
        $product1->setTitle('Wireless Headphones');
        $product1->setDescription('Very good headphones');
        $product1->setPrice(79.99);
        $product1->setCategory($electronics);

        $manager->persist($product1);

        // PRODUCT 2
        $product2 = new Product();
        $product2->setTitle('Leather Jacket');
        $product2->setDescription('Black leather jacket');
        $product2->setPrice(149.99);
        $product2->setCategory($fashion);

        $manager->persist($product2);

        $manager->flush();
    }
}
