<?php

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 01/09/16
 * Time: 10:55
 */

namespace CatalogBundle\DataFixtures\ORM ;

use CatalogBundle\Entity\Category;
use CatalogBundle\Entity\Image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadImageData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $image1 = new Image();
        $image1->setUrl('/home/src/test/web/bundles/catalog/images/iPhone-6s.jpg');
        $image1->setProduct($manager->merge($this->getReference('product1')));

        $image2 = new Image();
        $image2->setUrl('/home/src/test/web/bundles/catalog/images/iPhone-6s-2.jpg');
        $image2->setProduct($manager->merge($this->getReference('product1')));




        $manager->persist($image1);
        $manager->persist($image2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3 ;
    }
}