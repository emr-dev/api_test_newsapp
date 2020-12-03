<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\ArticleCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @package App\CategoryController
 */
class ArticleController extends AbstractController
{

    /**
     * @return JsonResponse
     * @Route("api/article" ,name="article_list", methods={"GET"})
     */
    public function getArticle(Request $request)
    {
        $category_id = $request->get('category_id');
        $repo = $this->getDoctrine()->getRepository(Article::class);
        if($category_id){
            $articles = $repo->findBy(['category'=>$category_id]);
        }else{
            $articles = $repo->findAll();
        }
        return  new JsonResponse(['status'=>'ok','count'=>count($articles),'data'=>$articles]);
    }




}