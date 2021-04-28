<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/question')]
class QuestionController extends AbstractController
{
    #[Route('/', name: 'question_index', methods: ['GET'])]
    public function index(): Response
    {
        $questions = $this->getDoctrine()
            ->getRepository(Question::class)
            ->findAll();

        return $this->render('question/index.html.twig', [
            'questions' => $questions,
        ]);
    }


    #[Route('/new', name: 'question_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('question_index');
        }

        return $this->render('question/new.html.twig', [
            'question' => $question,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{numQu}', name: 'question_show', methods: ['GET'])]
    public function show(Question $question): Response
    {
        return $this->render('question/show.html.twig', [
            'question' => $question,
        ]);
    }

    #[Route('/rechercheq', name: 'search_question', methods: ['GET', 'POST'])]
    function RechercheQuestion(Request $request, QuestionRepository $questionRepository): Response
    {
        $data=$request->get('search');
        $questions=$questionRepository->findBy(['evalNom'=>$data]);
        return $this->render('question/index.html.twig',[
            'questions'=>$questions]);

    }

    #[Route('/{id}/affiche', name: 'question_show1', methods: ['GET', 'POST'])]
    public function show1(Request $request,QuestionRepository $questionRepository): Response
    {
        $data=$request->get('id');
        $questions=$questionRepository->findBy(['evaluation'=>$data]);


        return $this->render('question/affichequizz.html.twig',[
            'questions'=>$questions]);

    }

    #[Route('/{numQu}/edit', name: 'question_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Question $question): Response
    {
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_index');
        }

        return $this->render('question/edit.html.twig', [
            'question' => $question,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{numQu}', name: 'question_delete', methods: ['POST'])]
    public function delete(Request $request, Question $question): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getNumQu(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($question);
            $entityManager->flush();
        }

        return $this->redirectToRoute('question_index');
    }
}
