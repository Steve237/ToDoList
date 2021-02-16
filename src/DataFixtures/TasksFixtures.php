<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Task;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TasksFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {   

        $task1 = new Task();
        $task1->setTitle("faire du vélo");
        $task1->setContent("faire du vélo tout le weekend");
        $task1->setCreatedAt(new DateTime());
        $task1->setUsername($this->getReference(UserFixtures::USER_REFERENCE));

        $task2 = new Task();
        $task2->setTitle("faire du ski");
        $task2->setContent("faire du ski tout le weekend");
        $task2->setCreatedAt(new DateTime());
        $task2->setUsername($this->getReference(UserFixtures::USER_REFERENCE));


        $task3 = new Task();
        $task3->setTitle("faire de la moto");
        $task3->setContent("faire de la moto lundi prochain");
        $task3->setCreatedAt(new DateTime());
        $task3->setUsername($this->getReference(UserFixtures::ADMIN_REFERENCE));


        $task4 = new Task();
        $task4->setTitle("faire de la moto");
        $task4->setContent("faire de la moto lundi prochain");
        $task4->setCreatedAt(new DateTime());
        $task4->setUsername($this->getReference(UserFixtures::ADMIN_REFERENCE));

        
        $manager->persist($task1);
        $manager->persist($task2);
        $manager->persist($task3);
        $manager->persist($task4);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
