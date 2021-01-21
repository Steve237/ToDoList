<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Tests\DataFixtures\DataFixtureTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    //test accès à la page d'accueil
   public function testDisplayLogin() {

    $client = static::createClient();
    $client->request('GET', '/login');
    $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    $this->assertSelectorTextContains('button', 'Se connecter');
    $this->assertSelectorNotExists('.alert.alert-danger');

    }

    //test de connexion avec mauvais identifiants
    public function testLoginWithBadCredentials()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton("Se connecter")->form([
            '_username' => 'frankydu45',
            '_password' => 'Hellomec'
        ]);
        
        $client->submit($form);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorExists('.alert.alert-danger');
    }

    //test connexion avex role_user
    public function testLoginWithRoleUser()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton("Se connecter")->form([
            '_username' => 'Espirito238',
            '_password' => 'Espirito237'
        ]);
        
        $client->submit($form);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', "Bienvenue sur Todo List, l'application vous permettant de gérer l'ensemble de vos tâches sans effort !");

        return $client;
    }

    //test connexion avec role_admin
    public function testLoginWithRoleAdmin()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton("Se connecter")->form([
            '_username' => 'Essama',
            '_password' => 'Espirito237'
        ]);
        
        $client->submit($form);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', "Bienvenue sur Todo List, l'application vous permettant de gérer l'ensemble de vos tâches sans effort !");

        return $client;

    }

}