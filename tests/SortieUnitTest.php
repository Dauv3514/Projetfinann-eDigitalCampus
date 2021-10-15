<?php

namespace App\Tests;

use App\Entity\Sortie;
use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class SortieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $sortie = new Sortie();

        $datetime = new DateTime();
        $user = new User();

        $sortie->setDate($datetime);
        $sortie->setDatecreationsortie($datetime);
        $sortie->setMiseajoursortie($datetime);
        $sortie->setVille('durand');
        $sortie->setAdresse('andre');
        $sortie->setImage('https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $sortie->setDescription('andre3514');
        $sortie->setUser($user);

        $this->assertTrue($sortie->getUser () === $user);
        $this->assertTrue($sortie->getDatecreationsortie() === $datetime);
        $this->assertTrue($sortie->getMiseajoursortie () === $datetime);
        $this->assertTrue($sortie->getDate () === $datetime);
        $this->assertTrue($sortie->getVille () === 'durand');
        $this->assertTrue($sortie->getAdresse () === 'andre');
        $this->assertTrue($sortie->getImage () === 'https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $this->assertTrue($sortie->getDescription () === 'andre3514');
    }

    public function testIsFalse()
    {
        $sortie = new Sortie();

        $datetime = new DateTime();

        $sortie->setDate($datetime);
        $sortie->setDatecreationsortie($datetime);
        $sortie->setMiseajoursortie($datetime);
        $sortie->setVille('durand');
        $sortie->setAdresse('andre');
        $sortie->setImage('https://static1.purepeople.com/articles/9/38/34/89/@/5527529-andre-manoukian-au-photocall-de-la-confe-amp_article_image_big-2.jpg');
        $sortie->setDescription('andre3514');
        $sortie->setUser(new User());

        $this->assertFalse($sortie->getUser () === new User());
        $this->assertFalse($sortie->getDate () === new DateTime());
        $this->assertTrue($sortie->getDatecreationsortie() === $datetime);
        $this->assertTrue($sortie->getMiseajoursortie () === $datetime);
        $this->assertFalse($sortie->getVille () === 'false');
        $this->assertFalse($sortie->getAdresse () === 'andrefalse');
        $this->assertFalse($sortie->getImage () === 'fals2');
        $this->assertFalse($sortie->getDescription() === 'falseul');
    }

    public function testIsEmpty()
    {
        $sortie = new Sortie();

        $this->assertEmpty($sortie->getMiseajoursortie ());
        $this->assertEmpty($sortie->getDatecreationsortie ());
        $this->assertEmpty($sortie->getDate ());
        $this->assertEmpty($sortie->getVille ());
        $this->assertEmpty($sortie->getAdresse ());
        $this->assertEmpty($sortie->getImage ());
        $this->assertEmpty($sortie->getDescription ());
        $this->assertEmpty($sortie->getUser());

    }

}

