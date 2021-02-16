<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture 
{
    public const USER_REFERENCE = 'user';
    public const ADMIN_REFERENCE = 'user2';

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Essama');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$Lk5xdTVneHo3YjE0RHRmbA$ZLWKFJysfGM9SlxDkKAWfxGFye+X13RrLOHD1cZK9L4');
        $user->setEmail('adouessono@yahoo.fr');
        $user->setRoles(['ROLE_ADMIN']);
        

        $user1 = new User();
        $user1->setUsername('Steven450');
        $user1->setPassword('$argon2id$v=19$m=65536,t=4,p=1$SS9XZm5SZlNkbXh1MmNYLw$jirQwndQw0XtWlWQV0aUqz0u8tpxn3DvAoez7TFH640');
        $user1->setEmail('essonoadou69852@gmail.com');
        $user1->setRoles(['ROLE_USER']);
        
        $manager->persist($user);
        $manager->persist($user1);

        $manager->flush();

        $this->addReference(self::USER_REFERENCE, $user);
        $this->addReference(self::ADMIN_REFERENCE, $user1);
    }
}
