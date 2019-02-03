<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\InterUser;
use App\Entity\InterGroup;


class InterUserGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create some groups, leave them for user to group association
        $admGroup = new Intergroup();
        $admGroup->setName("Sharp Administrators");
        $manager->persist($admGroup);

        $leadsGroup = new Intergroup();
        $leadsGroup->setName("BFF Team Leads");
        $manager->persist($leadsGroup);

        $devsGroup = new Intergroup();
        $devsGroup->setName("Rockstar Developers");
        $manager->persist($devsGroup);

        // Create some Star Wars themed users
        $mockUser = new InterUser();
        $mockUser->setName("Obi-Wan Kenobi");
        $mockUser->addInterGroup($admGroup);
        $mockUser->addInterGroup($leadsGroup);
        $manager->persist($mockUser);

        $mockUser = new InterUser();
        $mockUser->setName("Luke Skywalker");
        $mockUser->addInterGroup($leadsGroup);
        $mockUser->addInterGroup($devsGroup);
        $manager->persist($mockUser);

        $mockUser = new InterUser();
        $mockUser->setName("R2-D2");
        $mockUser->addInterGroup($devsGroup);
        $manager->persist($mockUser);

        $mockUser = new InterUser();
        $mockUser->setName("3CPO");
        $mockUser->addInterGroup($devsGroup);
        $manager->persist($mockUser);

        // Write to DB!
        $manager->flush();
    }
}
