<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class UserFixtures extends Fixture
{

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        // Создаем пользователя
        $user = new User();
        $user->setUsername('admin');
        $user->setSalt(md5(time()));
        $user->setPassword($encoder->encodePassword('admin', $user->getSalt()));
        $user->setApiToken($encoder->encodePassword('admin'.md5(date('Y-m-d H:i:s')), $user->getSalt()));
        $manager->persist($user);
        $manager->flush();
        return 1;
    }
}