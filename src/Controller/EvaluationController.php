<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Form\EvaluationType;
use App\Repository\EvaluationRepository;
use App\Repository\QuestionRepository;
use App\Repository\StudentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

#[Route('/evaluation')]
class EvaluationController extends AbstractController
{
    #[Route('/', name: 'evaluation_index', methods: ['GET'])]
    public function index(EvaluationRepository $evaluationRepository): Response
    {
        return $this->render('evaluation/index.html.twig', [
            'evaluations' => $evaluationRepository->findAll(),
        ]);
    }

    #[Route('/afficheEval', name: 'afficheEval', methods: ['GET'])]
    public function index1( Request $request ,
                            EvaluationRepository $evaluationRepository ,
                            QuestionRepository $questionRepository,
                            PaginatorInterface $paginator ): Response
    {

        $data = $paginator->paginate(
            $evaluationRepository->findAll() ,
            $request->query->getInt('page' , 1) ,
            3
        );
        return $this->render('evaluation/index1.html.twig', [
            'evaluations' => $data,
        ]);
    }

    #[Route('/new', name: 'evaluation_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $evaluation = new Evaluation();
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluation);
            $entityManager->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/new.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{evalNom}', name: 'evaluation_show', methods: ['GET'])]
    public function show(Evaluation $evaluation): Response
    {
        return $this->render('evaluation/show.html.twig', [
            'evaluation' => $evaluation,
        ]);
    }

    #[Route('/recherche', name: 'searcha', methods: ['GET', 'POST'])]
    function Recherche(Request $request, EvaluationRepository $evaluationRepository): Response
    {
        $data=$request->get('search');
        $evaluations=$evaluationRepository->findBy(['evalNom'=>$data]);
        return $this->render('evaluation/index.html.twig',[
            'evaluations'=>$evaluations]);

    }


    #[Route('/searchEvaluation', name: 'searchEvaluation', methods: ['GET', 'POST'])]
    public function searchEvaluation(Request $request,NormalizerInterface $Normalizer)
    {
        $repository = $this->getDoctrine()->getRepository(Evaluation::class);
        $requestString=$request->get('searchValue');
        $evaluations = $repository->findEvaluationByNom($requestString);
        $jsonContent = $Normalizer->normalize($evaluations, 'json',['groups'=>'evaluations:read']);
        $retour=json_encode($jsonContent);
        return new Response($retour);

    }




    #[Route('/{evalNom}/edit', name: 'evaluation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Evaluation $evaluation): Response
    {
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/edit.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{evalNom}', name: 'evaluation_delete', methods: ['POST'])]
    public function delete(Request $request, Evaluation $evaluation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluation->getEvalNom(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evaluation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evaluation_index');
    }



}
