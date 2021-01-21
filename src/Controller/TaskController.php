<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    /**
     * @Route("/main/open_tasks", name="open_tasks_list")
     */
    public function listAction(TaskRepository $repoTask)
    {

        $tasks = $repoTask->findOpenTasks();

        return $this->render('task/list.html.twig', [

            "tasks" => $tasks


        ]);
    }

    /**
     * @Route("/main/closed_tasks", name="closed_tasks_list")
     */
    public function closedTask(TaskRepository $repoTask)
    {

        $tasks = $repoTask->findClosedTasks();

        return $this->render('task/closed_task_list.html.twig', [

            "tasks" => $tasks


        ]);
    }

    
    /**
     * @Route("/main/tasks/create", name="task_create")
     */
    public function createAction(Request $request, EntityManagerInterface $entity)
    {
        $username = $this->getUser();

        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task->setUsername($username);
            $entity->persist($task);
            $entity->flush();

            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('open_tasks_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/main/tasks/{id}/edit", name="task_edit")
     */
    public function editAction(Task $task, Request $request, EntityManagerInterface $entity)
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entity->persist($task);
            $entity->flush();

            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('open_tasks_list');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }

    /**
     * @Route("/main/tasks/{id}/toggle", name="task_toggle")
     */
    public function toggleTaskAction(Task $task, EntityManagerInterface $entity)
    {
        $task->toggle(!$task->isDone());
        $entity->flush();

        if($task->isDone() == 0) {


            $task->toggle($task->isDone());
            $entity->flush();

            $this->addFlash('success', sprintf('La tâche a bien été marquée comme non terminé.', $task->getTitle()));

                    return $this->redirectToRoute('open_tasks_list');


        }


        $this->addFlash('success', sprintf('La tâche a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('closed_tasks_list');
    }

    /**
     * @Route("/main/tasks/{id}/delete", name="task_delete")
     */
    public function deleteTaskAction(Task $task, EntityManagerInterface $entity)
    {
        $entity->remove($task);
        $entity->flush();

        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('open_tasks_list');
    }
}
