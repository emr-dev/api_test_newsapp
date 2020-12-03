<?php


namespace App\Controller;


use App\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @package App\CategoryController
 * @Route("/api" ,name="category")
 */
class CategoryController extends AbstractController
{

    /**
     * @return JsonResponse
     * @Route("/category" ,name="list", methods={"GET"})
     */
    public function index()
    {
        $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();

        return  new JsonResponse(['status'=>'ok','data'=>$categories]);
    }

}