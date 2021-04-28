<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Entity\Resultat;
use App\Form\ResultatType;
use App\Repository\EvaluationRepository;
use App\Repository\QuestionRepository;
use App\Repository\ResultatRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/resultat')]
class ResultatController extends AbstractController
{
    #[Route('/', name: 'resultat_index', methods: ['GET'])]
    public function index(): Response
    {
        $resultats = $this->getDoctrine()
            ->getRepository(Resultat::class)
            ->findAll();

        return $this->render('resultat/index.html.twig', [
            'resultats' => $resultats,
        ]);
    }

    #[Route('/new', name: 'resultat_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $resultat = new Resultat();
        $form = $this->createForm(ResultatType::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resultat);
            $entityManager->flush();

            return $this->redirectToRoute('resultat_index');
        }

        return $this->render('resultat/new.html.twig', [
            'resultat' => $resultat,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idRes}', name: 'resultat_show', methods: ['GET'])]
    public function show(Resultat $resultat): Response
    {
        return $this->render('resultat/show.html.twig', [
            'resultat' => $resultat,
        ]);
    }

    #[Route('/rechercher', name: 'search_resultat', methods: ['GET', 'POST'])]
    function RechercheResultat(Request $request, ResultatRepository $resultatRepository): Response
    {
        $data=$request->get('search');
        $resultats=$resultatRepository->findBy(['nomEval'=>$data]);
        return $this->render('resultat/index.html.twig',[
            'resultats'=>$resultats]);

    }

    /**
     * @param ResultatRepository $repository
     * @return Response
     * @Route ("listname" , name="triName" ,methods={"GET"})
     */

    public function listAction(ResultatRepository $repository)
    {
        $resultats=$repository->findOrderedByName();
        return $this->render('resultat/index.html.twig', [
            'resultats' => $resultats,
        ]);
    }

    #[Route('/{idRes}/edit', name: 'resultat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resultat $resultat): Response
    {
        $form = $this->createForm(ResultatType::class, $resultat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultat_index');
        }

        return $this->render('resultat/edit.html.twig', [
            'resultat' => $resultat,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idRes}', name: 'resultat_delete', methods: ['POST'])]
    public function delete(Request $request, Resultat $resultat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resultat->getIdRes(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resultat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resultat_index');
    }

    #[Route('/ordonner', name: 'ordonner', methods: ['GET', 'POST'])]
    function Ordonner(ResultatRepository $resultatRepository): Response
    {
        $resultats=$resultatRepository->orderByNoteQB();
        return $this->render('resultat/index.html.twig',[
            'resultats'=>$resultats]);
    }

    #[Route('/quizResult/{id_eval}', name: 'quizResult', methods: ['GET', 'POST'])]
    function QuizResult(Request $request ,  QuestionRepository $questionRepository ,
                        EvaluationRepository $evaluationRepository ,
                        UserRepository $userRepository
    ): Response
    {
        $data=$request->get('id_eval');
        $reponses = $request->get('responses');
        $note = $request->get('note');
        $questions=$questionRepository->findBy(['evaluation'=>$data]);

        //Post Method
        if ($request->getMethod() == Request::METHOD_POST) {
            $repList = array(' ') ;
            $nbReponseCorrecte = 0 ;
            foreach ($questions as $qu )
            {
                if ($request->get('choix_' . $qu->getNumQu()) != NULL)
                    array_push($repList , $request->get('choix_' . $qu->getNumQu()));
                else array_push($repList , ' ');

                if($request->get('choix_' . $qu->getNumQu()) == $qu->getRepCorr())
                    $nbReponseCorrecte++ ;

            }

            $eval = $evaluationRepository->find($data) ;
            // Calulating result and saving in db
            $note =  $nbReponseCorrecte  ;
            $res = new Resultat();
            $res->setIdEtud($userRepository->find(1)); // to be changed with id of the connected user
            $res->setIdEvaluation($eval);
            $res->setNomEval($eval->getEvalNom());
            $res->setNote($note);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($res);
            $entityManager->flush();

             return $this->redirect($this->generateUrl('quizResult' ,
                 [   'id_eval' => $data,
                     'responses' => $repList,
                    'note' =>$note
                 ]
             ));

        }
        return $this->render('resultat/resultatQuizz.html.twig',[
            'questions'=>$questions  , 'responses' => $reponses , 'note' => $note]);

    }



}
