<?php

/**
 * Created by PhpStorm.
 * User: walid
 * Date: 01/09/16
 * Time: 10:55
 */

namespace CatalogBundle\DataFixtures\ORM ;

use CatalogBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $smartPhon = new Category();
        $smartPhon->setName('smartphon');

        $electromanger = new Category();
        $electromanger->setName('electromanger');

        $manager->persist($smartPhon);
        $manager->persist($electromanger);
        $manager->flush();

        $this->addReference('category-smartphon', $smartPhon);
        $this->addReference('category-electromanger', $electromanger);
    }

    public function getOrder()
    {
        return 1 ;
    }
}