<?php

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 01/09/16
 * Time: 10:55
 */

namespace CatalogBundle\DataFixtures\ORM ;

use CatalogBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $product1 = new Product();
        $product1->setIsActive(1);
        $product1->setTitle('Iphone 6');
        $product1->setOrderInCatalog(1);
        $product1->setDescription(' Description  Iphone 6 ');
        $product1->setCategory($manager->merge($this->getReference('category-smartphon')));

        $productNotActivated = new Product();
        $productNotActivated->setIsActive(0);
        $productNotActivated->setTitle('Samsung 6');
        $productNotActivated->setOrderInCatalog(2);
        $productNotActivated->setDescription(' Description  Iphone 6 ');
        $productNotActivated->setCategory($manager->merge($this->getReference('category-smartphon')));


        $product2 = new Product();
        $product2->setIsActive(1);
        $product2->setTitle('Lave Linge Frontal');
        $product2->setOrderInCatalog(2);
        $product2->setDescription(' Description Lave Linge Frontal');
        $product2->setCategory($manager->merge($this->getReference('category-electromanger')));


        $manager->persist($product1);
        $manager->persist($productNotActivated);
        $manager->persist($product2);


        $this->addReference('product1', $product1);
        $this->addReference('productNotActivated', $productNotActivated);
        $this->addReference('product2', $product2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2 ;
    }
}