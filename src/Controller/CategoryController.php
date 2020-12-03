<?php


namespace App\Controller;


use App\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @package App\CategoryController
 */
class CategoryController extends AbstractController
{

    /**
     * @return JsonResponse
     * @Route("api/category" ,name="list", methods={"GET"})
     */
    public function getCategory()
    {
        $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();

        return  new JsonResponse(['status'=>'ok','data'=>$categories]);
    }




}