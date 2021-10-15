<?php

namespace App\Tests;

use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $datetime = new DateTime();

        $user->setDatecreationducompte($datetime);
        $user->setMiseajourcreationducompte($datetime);
        $user->setEmail('true@test.com');
        $user->setNom('durand');
        $user->setPrenom('andre');
        $user->setAvatar('https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $user->setPassword('andre3514');

        $this->assertTrue($user->getDatecreationducompte() === $datetime);
        $this->assertTrue($user->getMiseajourcreationducompte() === $datetime);
        $this->assertTrue($user->getEmail () === 'true@test.com');
        $this->assertTrue($user->getNom () === 'durand');
        $this->assertTrue($user->getPrenom () === 'andre');
        $this->assertTrue($user->getAvatar () === 'https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $this->assertTrue($user->getPassword () === 'andre3514');
    }

    public function testIsFalse()
    {
        $user = new User();

        $datetime = new DateTime();

        $user->setDatecreationducompte($datetime);
        $user->setMiseajourcreationducompte($datetime);
        $user->setEmail('true@test.com');
        $user->setNom('durand');
        $user->setPrenom('andre');
        $user->setAvatar('https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $user->setPassword('andre3514');

        $this->assertTrue($user->getDatecreationducompte() === $datetime);
        $this->assertTrue($user->getMiseajourcreationducompte() === $datetime);
        $this->assertFalse($user->getEmail () === 'false@test.com');
        $this->assertFalse($user->getNom () === 'false');
        $this->assertFalse($user->getPrenom () === 'andrefalse');
        $this->assertFalse($user->getAvatar () === 'fals2');
        $this->assertFalse($user->getPassword () === 'falseul');
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail ());
        $this->assertEmpty($user->getNom ());
        $this->assertEmpty($user->getPrenom ());
        $this->assertEmpty($user->getAvatar ());
        $this->assertEmpty($user->getDatecreationducompte ());
        $this->assertEmpty($user->getMiseajourcreationducompte ());

    }

}

