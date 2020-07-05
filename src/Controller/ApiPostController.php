<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPostController extends AbstractController
{
    /**
     * @Route("/api/post", name="api_post_index", methods={"GET"})
     */
    public function index(PostRepository $postRepository /* NormalizerInterface $normalizer Devient => */ /* SerializerInterface $serializer */ ) 
    // plus besoin car Le serializer sera fait dans la fonction this->json
    {

        // $posts = $postRepository->findAll();
        // devient 
        // $response = $this->json($postRepository->findAll(), 200, [], ['groups' => 'post:read']);


        // dd($posts); // http://127.0.0.1:8000/api/post  en GET

        /* $json = json_encode([
            'prenom' => 'Yassine',
            'nom' => 'Qayouh'
        ]); */

        //dd($json, $posts); // http://127.0.0.1:8000/api/post  en GET

        //$postsNormalises = $normalizer->normalize($posts, null, ['groups' => 'post:read']);
        // Devient 
        // $json = $serializer->serialize($posts, 'json', ['groups' => 'post:read']); qui est mis un peu plus bas car cette ligne en remplace 2

        // dd($postsNormalises);

        // -id #
        // -title #
        // -content #
        // -comments

        // $json = json_encode($posts);

        //$json = json_encode($postsNormalises);
        // Devient 
        // $json = $serializer->serialize($posts, 'json', ['groups' => 'post:read']);
        // Devient 
        // $response = $this->json($posts, 200, [], ['groups' => 'post:read']); qui est mis un peu plus bas car cette ligne en remplace 2

        // dd($json, $posts);

        // Normalisation des données <=> On transforme des données complexes (objets) en tableaux associatifs simples.
        // Annotation : @Groups <=> Permet de créer un groupe de sérialisation qui identifie les données à normaliser
 
        /* $response = new Response($json, 200, [
            "Content-Type" => "application/json"
        ]); */
        // Devient
        // $response = new JsonResponse($json, 200, [], true);
        // Devient
        // $response = $this->json($posts, 200, [], ['groups' => 'post:read']);
        
        /* $response = $this->json($postRepository->findAll(), 200, [], ['groups' => 'post:read']);


        return $response; */
        // Devient
        return $this->json($postRepository->findAll(), 200, [], ['groups' => 'post:read']);




        /* return $this->render('api_post/index.html.twig', [
            'controller_name' => 'ApiPostController',
        ]); */
    }
}
