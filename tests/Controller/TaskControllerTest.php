<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Tests\DataFixtures\DataFixtureTestCase;
use App\Tests\Controller\SecurityControllerTest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    //test accès à la page des taches ouvertes sans être connecté
    public function testListActionWithoutLogin()
    {
        // If the user isn't logged, should redirect to the login page
        $client = static::createClient();
        $client->request('GET', '/main/open_tasks');
        $this->assertResponseRedirects();


        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        
        // Test if login field exists
        static::assertSame(1, $crawler->filter('input[name="_username"]')->count());
        static::assertSame(1, $crawler->filter('input[name="_password"]')->count());
    }

    // test accès à la liste des taches en cours avec le rôle user
    public function testAccessTasksListWithRoleUser()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();

        $crawler = $client->request('GET', 'main/open_tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

     // test accès à la liste des taches en cours avec le rôle user
    public function testAccessTasksListWithRoleAdmin()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleAdmin();

        $crawler = $client->request('GET', 'main/open_tasks');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

     // test creation tache avec le rôle user
    public function testCreateTaskWithRoleUser()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();

        $crawler = $client->request('GET', '/main/tasks/create');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->selectButton("Ajouter")->form();

        $form['task[title]'] = 'Nouvelle tâche';
        $form['task[content]'] = 'Ceci est une tâche crée par un test';
        $client->submit($form); 
        $this->assertResponseRedirects();

        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

      // test creation tache avec le rôle admin
      public function testCreateTaskWithRoleAdmin()
      {
          $securityControllerTest = new SecurityControllerTest();
          $client = $securityControllerTest->testLoginWithRoleAdmin();
  
          $crawler = $client->request('GET', '/main/tasks/create');
          $this->assertResponseStatusCodeSame(Response::HTTP_OK);
  
          $form = $crawler->selectButton("Ajouter")->form();
  
          $form['task[title]'] = 'Nouvelle tâche';
          $form['task[content]'] = 'Ceci est une tâche crée par un test';
          $client->submit($form); 
          $this->assertResponseRedirects();
  
          $crawler = $client->followRedirect();
          $this->assertResponseStatusCodeSame(Response::HTTP_OK);
  
      }

    // Edition d'une tâche par un utilisateur simple
    public function testEditTaskWithRoleUser()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();

        $crawler = $client->request('GET', '/main/tasks/12/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Modification de tache';
        $form['task[content]'] = 'Je modifie une tache';
        $client->submit($form);
        $this->assertResponseRedirects();

        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

    // Edition d'une tâche par un utilisateur simple
    public function testEditTaskWithRoleAdmin()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleAdmin();

        $crawler = $client->request('GET', '/main/tasks/15/edit');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Modification de tache';
        $form['task[content]'] = 'Je modifie une tache';
        $client->submit($form);
        $this->assertResponseRedirects();
        
        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }


     // Suppression d'une tâche crée par un utiliseur simple et supprimé par le même auteur
     public function testDeleteTaskAction()
     {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();
 
        $crawler = $client->request('GET', '/main/tasks/44/delete');
        $this->assertResponseRedirects();
         
        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertSelectorExists('.alert.alert-success');
 
    }

    public function testDeleteTaskActionWhereItemDontExists()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();

        $crawler = $client->request('GET', '/main/tasks/-100/delete');
        static::assertSame(404, $client->getResponse()->getStatusCode());
    }

    public function testToggleTaskAction()
    {
        $securityControllerTest = new SecurityControllerTest();
        $client = $securityControllerTest->testLoginWithRoleUser();

        $crawler = $client->request('GET', '/main/tasks/20/toggle');
        $this->assertResponseRedirects();


        $crawler = $client->followRedirect();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

    }

}
