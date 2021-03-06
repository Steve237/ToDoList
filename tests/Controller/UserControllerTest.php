<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Tests\DataFixtures\DataFixtureTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testListUsersWithoutLogin()
    {
        // If the user isn't logged, should redirect to the login page
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/users');
        $this->assertResponseRedirects();

        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    //test accès à la liste des users avec le role admin
    public function testAccesListUsers()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleAdmin();

        $crawler = $client->request('GET', '/admin/users');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $this->assertSelectorTextContains('h1', "Liste des utilisateurs");

    }

    public function testEditUser()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleAdmin();

        $crawler = $client->request('GET', '/admin/users/51/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->selectButton("Modifier")->form();
        $form['user[username]'] = 'Espirito2956';
        $form['user[password][first]'] = 'Espirito237';
        $form['user[password][second]'] = 'Espirito237';
        $form['user[email]'] = 'editeduser99@example.org';
        $form['user[roles]'] = 'ROLE_USER';
        
        $client->submit($form);
        $this->assertResponseRedirects();
        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

    public function testCreateAction()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleAdmin();

        $crawler = $client->request('GET', '/users/create');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);


        $form = $crawler->selectButton("Ajouter")->form();
        $form['user[username]'] = 'kingdukamer932';
        $form['user[password][first]'] = 'Espirito257';
        $form['user[password][second]'] = 'Espirito257';
        $form['user[email]'] = 'newkamer932@example154.org';
        $form['user[roles]'] = 'ROLE_USER';
        
        $client->submit($form);
        $this->assertResponseRedirects();
        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

}